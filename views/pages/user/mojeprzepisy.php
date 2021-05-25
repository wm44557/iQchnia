<div class="container">
    <div class="panelContentUser">
        <ul>
            <?php foreach ($params['recipes'] as $recipe) {
                echo '
                        <li class="item item2" >
                        <div class="box box2">
                            <article class="media">
                                <div class="media-left">
                                        <img src="/iQchnia/public/' . $recipe->photo . '" alt="Image">
                                </div>
                                <div class="media-content">
                                            <strong>' . $recipe->category . '</strong> <small>@' . $recipe->login . '</small> <small></small>
                                            <br>
                                            <strong>' . $recipe->title . '</strong>
                                            <br>



                                            <p class="overflow-ellipsis">' . $recipe->description . '</p>

                                            <br>


                                            <div class="content23">
                                      


                                                <form action="' . STARTING_URL . '/user/przepis?id=' . $recipe->id . '" method="post"><input class="button is-small is-dark" type="submit" value="Zobacz przepis"></form>

                                                <form action="' . STARTING_URL . '/user/edytujtresc?id=' . $recipe->id . '" method="post"><input class="button is-small is-info" type="submit" value="Edytuj treść"></form>
                                                <form action="' . STARTING_URL . '/user/edytujskladniki?id=' . $recipe->id . '" method="post"><input class="button is-small is-link" type="submit" value="Edytuj składniki"></form>        
                                                <form action="' . STARTING_URL . '/user/mojeprzepisy?deleteID=' . $recipe->id . '" method="post"><input class="button is-small is-danger" type="submit" value="Usuń przepis"></form>
                                                </div>

                                    </div>
                                   
                            </article>
                        </div>
                    </li>
                        
                        
                        
                        
                        ';
            }
            ?>


        </ul>
    </div>

</div>