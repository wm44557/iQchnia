<div class="container">
    <div class="panelContentUser space">
        <span class="tag is-normal">
            @ <?php echo $params['recipe']->login  ?>
        </span>
        <span class="tag is-info is-normal"><?php echo $params['recipe']->diets  ?></span>
        <span class="tag is-link is-normal"><?php echo $params['recipe']->category  ?></span>

        <h1 class=" subtitle is-1"><?php echo $params['recipe']->title  ?></h1>




        <table class="table">
            <thead>
                <tr>
                    <th>Ilość</th>
                    <th>Składnik</th>
                    <th>Miara</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Ilość</th>
                    <th>Składnik</th>
                    <th>Miara</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($params['ingredients'] as $item) {
                    echo "
                                <tr>
                                <td>" . $item->amount . "</td>
                                <td>" . $item->name . "</td>
                                <td>" . $item->unitName . "</td>
                                </tr>
                            ";
                }
                ?>

            </tbody>
        </table>

        <br>

        <article class="message">
            <div class="message-body">
                <?php echo $params['recipe']->description  ?>
            </div>
        </article>
        <p>Stopień trudności:</p>
        <progress class="progress is-small" value=<?php echo $params['recipe']->difficulty  ?> max="3">20%</progress>
        <p><?php echo $params['recipe']->difficulties ?></p>

        <div class="icon-text" style="text-align: center !important;">
            <span class="icon has-text-info">
                <i class="fas fa-info-circle"></i>
            </span>
            <span><strong> <?php echo $params['recipe']->calories . " kcal"  ?></strong>.</span>

        </div>
        <figure class="image is-256x256">
            <img id="single" src=<?php echo '/iQchnia/public/' . $params['recipe']->photo  ?> alt="Image">
        </figure>


    </div>
</div>