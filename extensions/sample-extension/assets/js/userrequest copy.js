(function () {
    function init() {
        if (!window.jQuery) {
            setTimeout(init, 200);
            return;
        }

        const $ = window.jQuery;

        $(function () {
            const $container = $('[data-attribute-code="access_level_name"]');
            const $nameField = $('input[name="attr_access_level_name"]');

            // Update the visible input box
            function setFieldValue(name) {
                if ($nameField.length) {
                    $nameField.val(name).trigger('change').trigger('input');
                }
            }

            // Build the UI
            function render(items) {
                if (!items || !items.length) {
                    $container.find('.access-level-wrapper').remove();
                    return;
                }

                const currentVal = $nameField.val();

                // Pure HTML structure - CSS handles the look
                let html = `
                    <div class="access-level-wrapper">
                        <div class="access-level-header">
                            <span>Select Access Level</span>
                            <span class="access-level-required">(Required)</span>
                        </div>
                        <div class="access-level-list">
                `;

                items.forEach(item => {
                    const isChecked = String(item.name) === String(currentVal);
                    html += `
                        <label>
                            <input type="radio" name="al_radio" value="${item.name}" ${isChecked ? 'checked' : ''}>
                            <span>${item.name}</span>
                        </label>`;
                });

                html += `</div></div>`;

                $container.find('.access-level-wrapper').remove();
                $container.append(html);
            }

            // Fetch from Server
            function loadData(id) {
                if (!id) return;
                $.post('/itop/pages/exec.php?exec_module=sample-extension&exec_page=ajax/get_access_level.php',
                    { subcategory_id: id }, function (res) {
                        if (res.success) render(res.data);
                    }, 'json');
            }

            // EVENT: Radio selection
            $(document).on('change', 'input[name="al_radio"]', function () {
                setFieldValue($(this).val());
            });

            // EVENT: Subcategory change
            $(document).on('change', '[data-attribute-code="servicesubcategory_id"] select', function () {
                setFieldValue('');
                loadData($(this).val());
            });

            // Initial Load logic
            setTimeout(() => {
                const subId = $('[data-attribute-code="servicesubcategory_id"] select').val();
                if (subId) loadData(subId);
            }, 600);
        });
    }
    init();
})();