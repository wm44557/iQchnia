
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

      <section class="container mt-5" id="res">
           <div class="columns features is-multiline is-vcentered" >

            <?php
            $cnt = 0;
            foreach ($params['recipes'] as $recipe) {

              if ($cnt==3){
                echo '</div><div class="columns features is-vcentered is-multiline">';
                $cnt = 0;
              }
              echo '
            <div class="rec column is-4 " data-tags="' . $recipe->tag . '">
              <div class="card">
                <div class="card-image">
                <figure class="image is-4by3">
                <img src="/iQchnia/public/' . $recipe->photo . '" alt="Placeholder image">
                </figure>
                </div>
                <div class="card-content">
                <div class="media">
                <div class="media-left">
                </div>
                <div class="media-content">
                  <p class="title is-4">' . $recipe->title . '</p>
                  <p class="subtitle is-6">@' . $recipe->login . '</p>
                </div>
                </div>

                <div class="content overflow-ellipsis">
                ' . $recipe->description . '
                <br>
                <div class="columns is-centered mt-2">
                  <div class="column is-1"><a class="level-item" aria-label="like" href="' . STARTING_URL . '/user/ulubione?liked=' . $recipe->id . '">
                      <span class="icon is-small">
                          <i class="fas fa-heart" aria-hidden="true"></i>
                      </span>
                  </a></div>
                  <div class="column is-4"><form action="' . STARTING_URL . '/user/przepis?id=' . $recipe->id . '" method="post"><input class="button is-small" type="submit" value="Zobacz przepis"></form></div>
                </div>


                </div>
                </div>
                </div>
                </div>
                      ';
                      $cnt+=1;



                    } ?>


      </div>
    </section>
</div>

<script>
    const elements = document.querySelectorAll('.rec');
    const input = document.getElementById("ins");
    const ul = document.getElementById('res');


    const searchTask = (e) => {
        let searchText = e.target.value.toLowerCase();
        let searchTextArray = searchText.split(" ");
        let recipes = [...elements];
        console.log(searchTextArray);
        searchTextArray.forEach(searchTextArrayItem =>
            recipes = recipes.filter(li => li.dataset.tags.toLocaleLowerCase().includes(searchTextArrayItem))
        )
        console.log(recipes)

        ul.textContent = "";

        let div = document.createElement('div');
        div.classList.add('columns');
        div.classList.add('features');

        ul.appendChild(div)

        if (recipes.length <= 3)
          recipes.forEach(li => div.appendChild(li))
        else
        {
          div.display = "block"
          recipes.forEach(li => div.appendChild(li))
        }



        if (recipes.length === 0)
          ul.textContent = "Brak dostępnych przepisów";
    }

    input.addEventListener('input', searchTask)
</script>
