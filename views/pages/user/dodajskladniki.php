<div class="container">
    <div class="panelContentUser">
        <br>
        <div class="content is-large">
            Dodaj składniki do przepisu <b><?php echo $params['recipeData']->title; ?>
            </b>

        </div>
        <div class="content is-medium">
            <ol type="1"> <?php foreach ($params['re_in_data'] as $item) {
                                echo "    <li> " . "  " . $item->amount . " " .  $item->unitName . " Składnika : " . $item->name . "</li>";
                            }
                            ?>
            </ol>
        </div>

        <form class="formRecipe" method="post" action="<?php echo STARTING_URL ?>/user/dodajskladniki">
            <div class="field">
                <label class="label">Wybierz składnik</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="ingredient_id">
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
                        <select name="unit">
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
                    <input class="input" type="number" placeholder="Podaj ilość ..." name="amount">
                </div>
            </div>


            <input id="recipe_id" name="recipe_id" type="hidden" value=<?php if (isset($params['recipeData']->id)) : ?> <?php echo $params['recipeData']->id ?> <?php endif; ?> />
            <input id="creator" name="creator" type="hidden" value=<?php echo $_SESSION['user_id']; ?> />
            <input class="button is-dark" type="submit" name="dodajKolejny" value="dodajKolejny">
        </form>





    </div>

</div>