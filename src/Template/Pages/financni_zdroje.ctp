<?php
$this->set('title', 'Finanční zdroje');
?>
<table class="datatable">
    <thead>
    <tr>
        <th>Kód</th>
        <th>Nadřízený kód</th>
        <th>Název</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($sources as $s) {
        ?>
        <tr>
            <td><?= $s->financniZdrojKod ?></td>
            <td><?= $s->financniZdrojNadrizenyKod ?></td>
            <td><?= $s->financniZdrojNazev ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Kód</td>
        <td>Nadřízený kód</td>
        <td>Název</td>
    </tr>
    </tfoot>
</table>

<script type="text/javascript">
    var sources = <?php echo json_encode($sources->toArray()) ?>;

    function unflatten(arr) {
        var tree = [],
            mappedArr = {},
            arrElem,
            mappedElem;

        // First map the nodes of the array to an object -> create a hash table.
        for (var i = 0, len = arr.length; i < len; i++) {
            arrElem = arr[i];
            arrElem.text = arrElem.financniZdrojNazev;
            mappedArr[arrElem.financniZdrojKod] = arrElem;
            mappedArr[arrElem.financniZdrojKod]['children'] = [];
        }


        for (var financniZdrojKod in mappedArr) {
            if (mappedArr.hasOwnProperty(financniZdrojKod)) {
                mappedElem = mappedArr[financniZdrojKod];
                // If the element is not at the root level, add it to its parent array of children.
                if (mappedElem.financniZdrojNadrizenyKod) {
                    mappedArr[mappedElem['financniZdrojNadrizenyKod']]['children'].push(mappedElem);
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