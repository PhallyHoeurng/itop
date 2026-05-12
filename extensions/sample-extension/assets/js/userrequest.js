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
            function getNameField() {
                return $('input[name^="attr_access_level_name"]');
            }
            function getIdField() {
                let $idField = $('input[name="attr_access_level_id"]');

                if ($idField.length === 0) {
                    const $form = getNameField().closest('form');

                    if ($form.length) {
                        $form.append('<input type="hidden" name="attr_access_level_id">');
                        $idField = $('input[name="attr_access_level_id"]');
                    }
                }
                return $idField;
            }
            function setReadonly() {
                getNameField()
                    .prop('readonly', true)
                    .css({
                        backgroundColor: '#f9f9f9',
                        cursor: 'not-allowed'
                    });
            }
            function setFieldValues(name, id) {
                const $nameField = getNameField();
                const $idField = getIdField();
                $nameField
                    .val(name || '')
                    .trigger('change')
                    .trigger('input');
                $idField
                    .val(id || '')
                    .trigger('change')
                    .trigger('input');
            }
            function clearValues() {
                setFieldValues('', '');
                $('.access-level-wrapper').remove();
            }
            function showLoading() {
                $('.access-level-wrapper').remove();
                $container.append(`
                    <div class="access-level-wrapper access-loading">
                        <div class="access-level-header">Loading access levels...</div>
                    </div>
                `);
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
                const currentName = String(getNameField().val() || '');
                const currentId = String(getIdField().val() || '');
                let html = `
                    <div class="access-level-wrapper">
                        <div class="access-level-header">
                            <span>Select Access Level</span>
                            <span class="access-level-required">Required</span>
                        </div>
                        <div class="access-level-list">
                `;
                items.forEach(function (item) {
                    const checked = (String(item.id) === currentId || String(item.name) === currentName) ? 'checked' : '';
                    html += `
                        <label>
                            <input type="radio" name="al_radio" value="${item.name}" data-id="${item.id}" ${checked}>
                            <span>${item.name}</span>
                        </label>
                    `;
                });
                html += `</div></div>`;
                $container.append(html);
                $('.access-level-wrapper').hide().fadeIn(200);
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
                showLoading();
                $.ajax({
                    url: '/itop/pages/exec.php?exec_module=sample-extension&exec_page=ajax/get_access_level.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { subcategory_id: subcategoryId },
                    success: function (response) {
                        $('.access-loading').remove();
                        if (response.success) {
                            cache[subcategoryId] = response.data || [];
                            render(response.data);
                        } else {
                            showNoData();
                        }
                    },
                    error: function () {
                        $('.access-loading').remove();
                        showNoData();
                    }
                });
            }
            $(document).on('change', 'input[name="al_radio"]', function () {
                setFieldValues($(this).val(), $(this).data('id'));
            });
            $(document).on('change', '[data-attribute-code="servicesubcategory_id"] select', function () {
                clearValues();
                loadData($(this).val());
            });
            setReadonly();
            setTimeout(function () {
                const subcategoryId = $('[data-attribute-code="servicesubcategory_id"] select').val();
                if (subcategoryId && subcategoryId !== '0') {
                    loadData(subcategoryId);
                }
            }, 500);
        });
    }
    init();
})();