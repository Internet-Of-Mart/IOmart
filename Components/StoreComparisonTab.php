<div class="window">
    <div class="window_box_container">
        <div class="window_box">
            <div class="tab_container">
                <a href="">Lights</a>
                <a href="">Temp</a>
                <a href="">Humidity</a>
            </div>
            <div class="graph_window">
                <?php
                include_once "../Components/graph_MDS.php"
                ?>
            </div>
            <div class="store_index_container">
                <div class="color_box"></div>
                <a>STORENAME</a>
            </div>
            <div class="store_index_container">
                <div class="color_box" style="background-color: red"></div>
                <a style="color: red">STORENAME</a>
            </div>
        </div>
    </div>
</div>


