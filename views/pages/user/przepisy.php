
<div class="container">
    <div class="panelContentUser2">
    <div class="container has-background-light p-3">
      <div class="container is-max-desktop">
        <form method="get" class="formSearch" id="searchform">
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
        </form>

        <!-- <?php dump($params['diets']) ?> -->

      <!--  <input class="input is-medium" type="text" id="in" placeholder="Wpisz tutaj posiadane składniki"> -->
        <div class="field has-addons ">
          <div class="control is-expanded">
            <input class="input" type="text" id="ins" placeholder="wpisz składniki">
          </div>
          <div class="control">
            <a class="button is-info is-dark " href="">
              Szukaj
            </a>
          </div>
        </div>
        <!-- <input class="button is-small is-dark  my-2" type="submit" value="Wyszukaj" form="searchform"> -->
      </div>

        <ul id="res">
            <?php foreach ($params['recipes'] as $recipe) {
              echo '
                      <li class="item lres" data-tags="' . $recipe->tag . '">
                      <div class="box">

                      <div class="columns">
                      <div class="column">
                        <h2 class="title"> '. $recipe->title .' </h2>
                        <h3 class="subtitle">'. $recipe->name .'</h2>

                      </div>
                      <div class="column">
                        Second column
                      </div>
                      <div class="column">
                        Third column
                      </div>
                      <div class="column">
                        Fourth column
                      </div>
                      </div>
                      </div>
                      </li>




                      ';
//-------------------------
//OLD ->
//-------------------------
                echo '
                        <li class="item lres" data-tags="' . $recipe->tag . '">
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                        <img src="/iQchnia/public/' . $recipe->photo . '" alt="Image">
                                </div>
                                <div class="media-content">
                                            <strong>' . $recipe->name . '</strong> <small>@' . $recipe->login . '</small> <small></small>
                                            <br>
                                            <strong">' . $recipe->title . '</strong>
                                            <br>



                                            <p class="overflow-ellipsis">' . $recipe->description . '</p>

                                            <br>


                                            <div class="content2">
                                                <a class="level-item" aria-label="like" href="' . STARTING_URL . '/user/ulubione?liked=' . $recipe->id . '">
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
        <div class="container is-max-desktop ">
        <nav class="pagination is-rounded my-3" role="navigation" aria-label="pagination">
          <a class="pagination-previous ">Poprzednia</a>
          <a class="pagination-next ">Następna</a>
          <ul class="pagination-list ">
            <li>
              <a class="pagination-link " aria-label="Goto page 1">1</a>
            </li>
            <li>
              <span class="pagination-ellipsis ">&hellip;</span>
            </li>
            <li>
              <a class="pagination-link " aria-label="Goto page 45">45</a>
            </li>
            <li>
              <a class="pagination-link is-dark" aria-label="Page 46" aria-current="page">46</a>
            </li>
            <li>
              <a class="pagination-link " aria-label="Goto page 47">47</a>
            </li>
            <li>
              <span class="pagination-ellipsis ">&hellip;</span>
            </li>
            <li>
              <a class="pagination-link " aria-label="Goto page 86">86</a>
            </li>
          </ul>
        </nav>
      </div>
      </div>
    </div>
</div>

<script>
    const liElements = document.querySelectorAll('.lres');
    const input = document.getElementById("ins");
    const ul = document.getElementById('res');

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
