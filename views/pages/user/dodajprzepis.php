<div class="container">
    <div class="panelContentUser">
        <!-- <?php dump($params['category']); ?> -->
        <form class="formRecipe" method="post">

            <div class="field">
                <label class="label">Tytuł</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Podaj tytuł ..." name="title">
                </div>
            </div>

            <div class="field">
                <label class="label">Opis</label>
                <div class="control">
                    <textarea class="textarea" placeholder="Podaj opis ..." name="description"></textarea>
                </div>
            </div>


            <div class="field">
                <label class="label">Wybierz kategorię</label>
                <div class="field">
                    <div class="select">
                        <select name="category">
                            <?php foreach ($params['category'] as $category) {
                                echo "    <option value=\"" . $category->id . "\"> " . $category->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Wybierz poziom trudności</label>
                <div class="field">
                    <div class="select">
                        <select name="difficulty">
                            <?php foreach ($params['difficulties'] as $difficulties) {
                                echo "    <option value=\"" . $difficulties->id . "\"> " . $difficulties->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Kalorie</label>
                <div class="control">
                    <input class="input" type="number" placeholder="Podaj liczbę kalorii..." name="calories">
                </div>
            </div>



            <div class="field">
                <label class="label">Wybierz typ kuchni</label>
                <div class="field">
                    <div class="select">
                        <select name="diet">
                            <?php foreach ($params['diets'] as $diets) {
                                echo "    <option value=\"" . $diets->id . "\"> " . $diets->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="file ">
                <label class="file-label ">
                    <input class="file-input " type="file" name="photo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Dodaj zdjęcie
                        </span>
                    </span>
                </label>
            </div>



            <input id="creator" name="creator" type="hidden" value=<?php echo $_SESSION['user_id']; ?> />
            <input class="button is-dark" type="submit" name="zapisz_dane" value="Zapisz dane">
        </form>

    </div>
</div>