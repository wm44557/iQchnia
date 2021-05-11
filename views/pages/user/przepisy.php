<div class="container">
    <div class=" panelContentUser">
        <?php foreach ($params['recipes'] as $recipe) {
            echo '
                        <div class="item">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-128x128">
                                        <img src="/iQchnia/public/' . $recipe->photo . '" alt="Image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>' . $recipe->name . '</strong> <small>@' . $recipe->login . '</small> <small></small>
                                            <br>
                                            <strong>' . $recipe->title . '</strong>
                                            <br>

                                            <p class="overflow-ellipsis">' . $recipe->description . '</p>
                                            <br>
            
                                        </p>
                                    </div>
                                    <nav class="level is-mobile">
                                        <div class="level-left">
            
                                            <a class="level-item" aria-label="like">
                                                <span class="icon is-small">
                                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                            <form action="<?php echo STARTING_URL ?>/" method="post"><input class="button is-small" type="submit" value="Zobacz przepis"></form>
            
                                        </div>
                                    </nav>
                                </div>
                            </article>
                        </div>
                    </div>
                        
                        
                        
                        
                        ';
        }
        ?>



    </div>

</div>