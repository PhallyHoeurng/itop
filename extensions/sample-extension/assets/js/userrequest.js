(function () {
    function init() {
        if (!window.jQuery) { setTimeout(init, 200); return; }
        const $ = window.jQuery;
        $(document).ready(function () {
            const $container = $('[data-attribute-code="access_level_name"]');
            const cache = {};
            let initialSubcategoryId = null;
            let isUserInteracting = false;

            function getNameField() { return $('input[name^="attr_access_level_name"]'); }
            function getIdField() {
                let $idField = $('input[name="attr_access_level_id"]').first();
                if (!$idField.length) {
                    const $form = getNameField().closest('form');
                    if ($form.length) {
                        const $existingId = $form.find('input[name^="attr_access_level_id"]').first();
                        if ($existingId.length) { $idField = $existingId; }
                        else {
                            $form.append('<input type="hidden" id="attr_access_level_id_hidden" name="attr_access_level_id">');
                            $idField = $('#attr_access_level_id_hidden');
                        }
                    }
                }
                return $idField;
            }
            function setReadonly() {
                getNameField().prop('readonly', true).attr('placeholder', 'Please select Access Level below').css({
                    backgroundColor: '#f3f3f3', cursor: 'default', color: '#555', pointerEvents: 'none'
                });
            }
            function setFieldValues(name, id) {
                const $nameField = getNameField();
                const $idField = getIdField();
                const newName = name || '';
                const newId = id || '';
                if ($nameField.val() !== String(newName)) { $nameField.val(newName); }
                if ($idField.val() !== String(newId)) { $idField.val(newId); }
            }
            function removeWrapper() { $('.access-level-wrapper').remove(); }
            function clearValues() {
                setFieldValues('', '');
                $('input[name="al_radio"]').prop('checked', false);
                removeWrapper();
            }
            function showNoData() {
                removeWrapper();
                $container.append('<div class="access-level-wrapper"><div style="color:#777; font-style:italic; padding:8px 0;">Access level is not available.</div></div>');
            }
            function syncRadioSelection() {
                const currentId = String(getIdField().val() || '').trim();
                const currentName = String(getNameField().val() || '').trim();
                $('input[name="al_radio"]').prop('checked', false);
                if (!currentId && !currentName) { return; }
                $('input[name="al_radio"]').each(function () {
                    const radioId = String($(this).data('id') || '').trim();
                    const radioName = String($(this).val() || '').trim();
                    if (radioId === currentId || radioName === currentName) { $(this).prop('checked', true); }
                });
            }
            function render(items) {
                removeWrapper();
                if (!items || items.length === 0) { showNoData(); return; }
                let html = '<div class="access-level-wrapper"><div class="access-level-header" style="margin-bottom:8px; font-weight:bold;">Select Access Level</div><div class="access-level-list">';
                items.forEach(function (item) {
                    const safeName = $('<div>').text(item.name).html();
                    html += `<label style="display:block; padding:5px 0; cursor:pointer;"><input type="radio" name="al_radio" value="${safeName}" data-id="${item.id}"> <span>${safeName}</span></label>`;
                });
                html += '</div></div>';
                $container.append(html);
                setTimeout(syncRadioSelection, 50);
            }
            function loadData(subcategoryId) {
                if (!subcategoryId || subcategoryId === '0') { clearValues(); return; }
                if (cache[subcategoryId]) { render(cache[subcategoryId]); return; }
                $.ajax({
                    url: '/itop/pages/exec.php?exec_module=sample-extension&exec_page=ajax/get_access_level.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { subcategory_id: subcategoryId },
                    success: function (response) {
                        if (response.success && response.data) {
                            cache[subcategoryId] = response.data;
                            render(response.data);
                        } else { showNoData(); }
                    },
                    error: function () { showNoData(); }
                });
            }
            $(document).on('change', 'input[name="al_radio"]', function () {
                setFieldValues($(this).val(), $(this).data('id'));
            });
            $(document).on('mousedown keydown focus', '[data-attribute-code="servicesubcategory_id"] select', function () {
                isUserInteracting = true;
            });
            $(document).on('change', '[data-attribute-code="servicesubcategory_id"] select', function () {
                const selectedVal = String($(this).val() || '');
                if (selectedVal !== initialSubcategoryId) {
                    if (isUserInteracting) { clearValues(); }
                    initialSubcategoryId = selectedVal;
                    loadData(selectedVal);
                }
                isUserInteracting = false;
            });
            setReadonly();
            function waitForSubcategory() {
                const $subSel = $('[data-attribute-code="servicesubcategory_id"] select');
                if (!$subSel.length) { setTimeout(waitForSubcategory, 200); return; }
                const startVal = String($subSel.val() || '');
                initialSubcategoryId = startVal;
                if (startVal && startVal !== '0') { loadData(startVal); }
            }
            waitForSubcategory();
        });
    }
    init();
})();