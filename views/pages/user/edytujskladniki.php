<div class="container">
    <div class="panelContentUser">
        <br>
        <div class="content is-large">
            </b>

        </div>
        <div class="content is-medium">
            <ol type="1"> <?php foreach ($params['re_in_data'] as $item) {
                                echo "    <li> " . "  " . $item->amount . " " .  $item->unitName . " Składnika : " . $item->name . "</li>";
                                echo '<form action="' . STARTING_URL . '/user/edytujskladniki?id=' . $_GET['id'] . '" method="post">
                                <input id="creator" name="deleteID" type="hidden" value=' . $item->id . '>
                                <input class="button is-small is-danger" type="submit" value="Usuń przepis"></form>';
                            }
                            ?>
            </ol>
        </div>

        <form class="formRecipe" method="post" <?php echo 'action="' . STARTING_URL . '/user/edytujskladniki?id=' . $_GET['id'] . '"' ?>>
            <div class="field">
                <label class="label">Wybierz składnik</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="ingredient_id" required>
                            <?php foreach ($params['ingredients'] as $ingredient) {
                                echo "    <option value=\"" . $ingredient->id . "\"> " . $ingredient->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="field">
                <label class="label">Wybierz jednostkę</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="unit" required>
                            <?php foreach ($params['units'] as $units) {
                                echo "    <option value=\"" . $units->id . "\"> " . $units->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Podaj ilość</label>
                <div class="control">
                    <input class="input" type="number" placeholder="Podaj ilość ..." name="amount" required>
                </div>
            </div>


            <input id="recipe_id" name="recipe_id" type="hidden" value=<?php echo $_GET['id'] ?> />
            <input id="creator" name="creator" type="hidden" value=<?php echo $_SESSION['user_id']; ?> />
            <input class="button is-dark" type="submit" name="dodajKolejny" value="Dodaj nowy składnik">
        </form>





    </div>

</div>