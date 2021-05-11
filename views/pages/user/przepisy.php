<div class="container">
    <div class="panelContentUser2">
        <input class="input is-large" type="text" id="in" placeholder="Wpisz tutaj składniki">
        <ul>
            <?php foreach ($params['recipes'] as $recipe) {
                echo '
                        <li class="item" data-tags="' . $recipe->tag . '">
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
    console.log({
        liElements,
        input,
        ul
    });
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