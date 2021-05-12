<div class="container">
    <div class="panelContentUser">
        <?php if (isset($params['info']) && $params['info'] != '') echo '

        <div class="notification is-info is-dark">
            <button class="delete"></button>
            ' . $params['info'] . '
        </div>
        ' ?>





        <input class="input is-medium" type="text" id="in" placeholder="Wpisz tutaj posiadane składniki">
        <ul>
            <?php foreach ($params['favRevipes'] as $recipe) {
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
                                                <a class="level-item" aria-label="like" href="' . STARTING_URL . '/user/ulubione?delete=' . $recipe->id . '">
                                                    <span class="icon is-small">
                                                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
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
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>