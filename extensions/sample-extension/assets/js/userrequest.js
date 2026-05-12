(function () {
    function init() {
        if (!window.jQuery) {
            setTimeout(init, 200);
            return;
        }
        const $ = window.jQuery;

        $(document).ready(function () {
            const $container = $('[data-attribute-code="access_level_name"]');
            const cache = {};

            function getNameField() { return $('input[name^="attr_access_level_name"]'); }

            function getIdField() {
                let $idField = $('input[name="attr_access_level_id"]');
                if ($idField.length === 0) {
                    // inject hidden field if missing
                    getNameField().closest('form').append('<input type="hidden" name="attr_access_level_id">');
                    $idField = $('input[name="attr_access_level_id"]');
                }
                return $idField;
            }

            function setFieldValues(name, id) {
                const $nameField = getNameField();
                const $idField = getIdField();

                $nameField.val(name || '').trigger('change').trigger('input');
                $idField.val(id || '').trigger('change').trigger('input');
            }

            function clearValues() {
                setFieldValues('', '');
                $('.access-level-wrapper').remove();
            }

            function showNoData() {
                $('.access-level-wrapper').remove();
                $container.append(`
                    <div class="access-level-wrapper">
                        <div class="access-level-header">
                            Access level is not available for this Service Subcategory.
                        </div>
                    </div>
                `);
                setFieldValues('', '');
            }

            function render(items) {
                $('.access-level-wrapper').remove();
                if (!items || items.length === 0) {
                    showNoData();
                    return;
                }

                let html = `
                    <div class="access-level-wrapper">
                        <div class="access-level-header">Select Access Level</div>
                        <div class="access-level-list">
                `;
                items.forEach(item => {
                    html += `
                        <label>
                            <input type="radio" name="al_radio" value="${item.name}" data-id="${item.id}">
                            <span>${item.name}</span>
                        </label>
                    `;
                });
                html += `</div></div>`;
                $container.append(html);
            }

            function loadData(subcategoryId) {
                if (!subcategoryId || subcategoryId === '0') {
                    clearValues();
                    return;
                }

                if (cache[subcategoryId]) {
                    render(cache[subcategoryId]);
                    return;
                }

                $.ajax({
                    url: '/itop/pages/exec.php?exec_module=sample-extension&exec_page=ajax/get_access_level.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { subcategory_id: subcategoryId },
                    success: function (res) {
                        if (res.success) {
                            cache[subcategoryId] = res.data || [];
                            render(res.data);
                        } else {
                            showNoData();
                        }
                    },
                    error: function () {
                        showNoData();
                    }
                });
            }

            // Sync radio selection to iTop fields
            $(document).on('change', 'input[name="al_radio"]', function () {
                setFieldValues($(this).val(), $(this).data('id'));
            });

            // Trigger on Subcategory change
            $(document).on('change', '[data-attribute-code="servicesubcategory_id"] select', function () {
                clearValues();
                loadData($(this).val());
            });

            // Set readonly and initial load
            getNameField().prop('readonly', true).css('background-color', '#f9f9f9');
            setTimeout(() => {
                const subId = $('[data-attribute-code="servicesubcategory_id"] select').val();
                if (subId && subId !== '0') loadData(subId);
            }, 500);
        });
    }
    init();
})();
