<?php
$this->set('title', 'Kapitoly Státního Rozpočtu - Ukazatele');
?>
<h2>Dynamický stroj ukazatelů kapitol státního rozpočtu</h2>
<div id="sourcestree"></div>
<script type="text/javascript">
    var sources = <?= json_encode($data) ?>;
    function unflatten(arr) {
        var tree = [],
            mappedArr = {},
            arrElem,
            mappedElem;

        // First map the nodes of the array to an object -> create a hash table.
        for (var i = 0, len = arr.length; i < len; i++) {
            arrElem = arr[i];
            arrElem.text = arrElem.statniRozpocetUkazatelKod + " :: " + arrElem.statniRozpocetUkazatelNazev;
            mappedArr[arrElem.statniRozpocetUkazatelKod] = arrElem;
            mappedArr[arrElem.statniRozpocetUkazatelKod]['children'] = [];
        }


        for (var statniRozpocetUkazatelKod in mappedArr) {
            if (mappedArr.hasOwnProperty(statniRozpocetUkazatelKod)) {
                mappedElem = mappedArr[statniRozpocetUkazatelKod];
                // If the element is not at the root level, add it to its parent array of children.
                if (mappedElem.statniRozpocetUkazatelNadrizenyKod) {
                    mappedArr[mappedElem['statniRozpocetUkazatelNadrizenyKod']]['children'].push(mappedElem);
                }
                // If the element is at the root level, add it to first level elements array.
                else {
                    tree.push(mappedElem);
                }
            }
        }
        return tree;
    }
    var sources_tree = unflatten(sources);
    $("#sourcestree").jstree({
        'core': {
            'data': sources_tree
        }
    });
</script>
