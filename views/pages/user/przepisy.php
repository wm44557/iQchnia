<div class="container">
    <div class="panelContentUser2">
        <form method="get" class="formSearch">
            <div class="field box is-small">
                <label class="label is-small ">Wybierz kategorię</label>
                <div class="field">
                    <div class="select  is-small is-fullwidth">

                        <select name="category">
                            <option value=""></option>

                            <?php foreach ($params['category'] as $category) {
                                echo "    <option value=\"" . $category->id . "\"> " . $category->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field box">
                <label class="label is-small">Wybierz typ kuchni</label>
                <div class="field">
                    <div class="select  is-small is-fullwidth">
                        <select name="diet">
                            <option value=""></option>

                            <?php foreach ($params['diets'] as $diets) {
                                echo "    <option value=\"" . $diets->id . "\"> " . $diets->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field box">
                <label class="label is-small">Wybierz poziom trudności</label>
                <div class="field">
                    <div class="select  is-small is-fullwidth">
                        <select name="difficulty">
                            <option value=""></option>
                            <?php foreach ($params['difficulty'] as $difficulty) {
                                echo "    <option value=\"" . $difficulty->id . "\"> " . $difficulty->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <input class="button is-small is-dark is-fullwidth" type="submit" value="Wyszukaj">
        </form>

        <!-- <?php dump($params['diets']) ?> -->

        <input class="input is-medium" type="text" id="in" placeholder="Wpisz tutaj posiadane składniki">
        <ul>
            <?php foreach ($params['recipes'] as $recipe) {
                echo '
                        <li class="item" data-tags="' . $recipe->tag . '">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                        <img src="/iQchnia/public/' . $recipe->photo . '" alt="Image">
                                </div>
                                <div class="media-content">
                                            <strong>' . $recipe->name . '</strong> <small>@' . $recipe->login . '</small> <small></small>
                                            <br>
                                            <strong>' . $recipe->title . '</strong>
                                            <br>



                                            <p class="overflow-ellipsis">' . $recipe->description . '</p>

                                            <br>


                                            <div class="content2">
                                                <a class="level-item" aria-label="like">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-heart" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            <form action="' . STARTING_URL . '/user/przepis?id=' . $recipe->id . '" method="post"><input class="button is-small" type="submit" value="Zobacz przepis"></form>
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

<script>
    const liElements = document.querySelectorAll('li');
    const input = document.getElementById("in");
    const ul = document.querySelector('ul');

    const searchTask = (e) => {
        let searchText = e.target.value.toLowerCase();
        let searchTextArray = searchText.split(" ");
        let recipes = [...liElements];
        console.log(searchTextArray);
        searchTextArray.forEach(searchTextArrayItem =>
            recipes = recipes.filter(li => li.dataset.tags.toLocaleLowerCase().includes(searchTextArrayItem))
        )
        console.log(recipes)

        ul.textContent = "";
        recipes.forEach(li => ul.appendChild(li))

    }
    input.addEventListener('input', searchTask)
</script>