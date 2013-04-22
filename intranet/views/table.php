<form id="mainform" action="">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">      
        <?php
        foreach ($this->list as $k => $w) {
            $alternate = (($k % 2) == 0) ? 'alternate-row' : '';
            echo ' <tr class="' . $alternate . '">';
            if ($k == 0) {
                foreach ($w as $k => $v) {
                    $style = 'width:' . $v['title'];
                    echo '<th class="table-header-repeat line-left minwidth-1" style=""><a href="' . $style . '">' . $v['title'] . '</a></th>';
                }
            } else {
                foreach ($w as $k => $v) {

                    echo '<td>' . $v . '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
</form>