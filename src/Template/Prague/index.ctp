<?php
$this->set('title', 'Hlavní město Praha - Granty');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#recipients">Podle příjemců</a></li>
    </ul>

    <div id="recipients">
        <table class="datatable" data-ajax="/granty-praha/ajax/prijemci">
            <thead>
            <tr>
                <th>Název příjemce</th>
                <th>IČ</th>
                <th>Právní forma</th>
                <th>Počet projektů</th>
                <th data-type="currency">Součet přidělených financí</th>
                <th data-type="currency">Součet vyčerpaných / vykázaných financí</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td>Název příjemce</td>
                <td>IČ</td>
                <td>Právní forma</td>
                <td>Počet projektů</td>
                <td>Součet přidělených financí</td>
                <td>Součet vyčerpaných / vykázaných financí</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>