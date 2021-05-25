<div class="container">
    <div class="panelContentUser">
        <?php if (isset($params['info']) && $params['info'] != '') echo '

        <div class="notification is-info is-dark">
            <button class="delete"></button>
            ' . $params['info'] . '
        </div>
        ' ?>


        <form class="formRecipe" method="post">

            <div class="field">
                <label class="label">Tytuł</label>
                <div class="control">
                    <input value='<?php echo $params['recipeData']->title; ?>' required class="input" type="text" placeholder="Podaj tytuł ..." name="title">
                </div>
            </div>

            <div class="field">
                <label class="label">Opis</label>
                <div class="control">
                    <textarea required class="textarea" placeholder="Podaj opis ..." name="description"><?php echo $params['recipeData']->description; ?></textarea>
                </div>
            </div>


            <div class="field">
                <label class="label">Wybierz kategorię</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="category" ?>
                            <?php foreach ($params['category'] as $category) {
                                if ($category->id == $params['recipeData']->category) {
                                    echo "    <option selected value=\"" . $category->id . "\"> " . $category->name . "</option>";
                                } else {
                                    echo "    <option value=\"" . $category->id . "\"> " . $category->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Wybierz poziom trudności</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="difficulty">
                            <?php foreach ($params['difficulty'] as $difficulties) {
                                if ($difficulties->id == $params['recipeData']->difficulty) {
                                    echo "    <option selected value=\"" . $difficulties->id . "\"> " . $difficulties->name . "</option>";
                                } else {
                                    echo "    <option value=\"" . $difficulties->id . "\"> " . $difficulties->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Kalorie</label>
                <div class="control">
                    <input value=<?php echo $params['recipeData']->calories; ?> class="input" type="number" placeholder="Podaj liczbę kalorii..." name="calories" required>
                </div>
            </div>



            <div class="field">
                <label class="label">Wybierz typ kuchni</label>
                <div class="field">
                    <div class="select  is-fullwidth">
                        <select name="diet" required>
                            <?php foreach ($params['diets'] as $diets) {
                                if ($diets->id == $params['recipeData']->diet) {
                                    echo "    <option selected value=\"" . $diets->id . "\"> " . $diets->name . "</option>";
                                } else {
                                    echo "    <option value=\"" . $diets->id . "\"> " . $diets->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>




            <input id="creator" name="recipe_id" type="hidden" value=<?php echo $params['recipeData']->id; ?> />
            <input class="button is-dark" type="submit" name="edytuj_dane" value="Edytuj dane">
        </form>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>