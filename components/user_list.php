<section class="user_list">

    <div class="container">

        <div class="row">

            <table class="table">

                <thead>

                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Group</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                $auth_user = new User();
                $user_list  = $auth_user->get_users();

                foreach ($user_list as $ul) {

                    $id = $ul['id'];
                    $name = $ul['user_name'];
                    $surname = $ul['surname'];
                    $email = $ul['email'];
                    $groups = $ul['groups'];

                   $output = '<tr>';
                   $output .= '<td>' . $id . '</td>';
                   $output .= '<td>' . $name . '</td>';
                   $output .= '<td>' . $surname . '</td>';
                   $output .= '<td>' . $email . '</td>';
                   $output .= '<td>' . $groups . '</td>';
                   $output .= '</tr>';

                    echo $output;
                }

                ?>

                </tbody>

            </table>
        </div>
    </div>
</section>