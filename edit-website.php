<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {

        header("location: index.php");
        exit();

    } elseif (isset($_SESSION["user_id"])) {
        require_once 'backend/db.php';
        require_once 'backend/display_index_page_welcome_to.php';
        require_once 'backend/display_popular_services.php';
        require_once 'backend/display_website_colors.php';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit website</title>

    <style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        padding-top: 100px;
    }

    .popular-services-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 40vw;
        border: 1px solid #000;
        border-radius: 5px;
        padding: 20px 0;
    }

    .popular-services-container form {
        width: 100%;
        height: 100%;
    }

    .popular-services-container form div div,
    label,
    input,
    textarea {
        width: 90%;
        font-size: 24px;
    }

    .popular-services-container form div button {
        width: 50%;
        font-size: 24px;
        padding: 8px 0;
    }

    .popular-services-container form div button:hover {
        cursor:pointer;
    }

    .popular-services-container form div div input, textarea {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index">HOME</a>
                </li>
                <li>
                    <a href="photo-gallery">GALLERY</a>
                </li>
                <li>
                    <a href="contact">CONTACT</a>
                </li>
                <li>
                    <a href="edit-images">EDIT IMAGES</a>
                </li>
                <li>
                    <a href="logout">EDIT CONTACT</a>
                </li>
                <li>
                    <a href="logout">LOGOUT</a>
                </li>
            </ul>
        </nav>
</header>
    <section>
        <div class="popular-services-container">
            <form id="index-page" action="backend/update_index_page_welcome_to" method="POST">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>welcome paragraphs</h3>
                    <div>
                        <label for="para-one">paragraph 1</label>
                        <br>
                        <textarea name="para_one" id="para-one"><?= $para_one ?></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="para-two">paragraph 2</label>
                        <br>
                        <textarea name="para_two" id="para-two"><?= $para_two ?></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="para-three">paragraph 3</label>
                        <br>
                        <textarea name="para_three" id="para-three"><?= $para_three ?></textarea>
                    </div>
                    <button type="submit" name="submit_para">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form id="popular-services" action="backend/update_popular_services.php" method="POST">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 1</h3>
                    <div>
                        <label for="popular-services-title">services section title</label>
                        <br>
                        <input type="text" id="popular-services-title" name="popular_services_title"
                            value="<?= $popular_services_title ?>">
                    </div>
                    <button type="submit" name="submit_popular_services_title">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 1</h3>
                    <div>
                        <label for="popular-service-1-title">title</label>
                        <br>
                        <input type="text" id="popular-service-1-title" name="popular_service_1_title"
                            value="<?= $popular_service_1_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-1-text">text</label>
                        <br>
                        <textarea name="popular_service_1_text"
                            id="popular-service-1-text"><?= $popular_service_1_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_1">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 2</h3>
                    <div>
                        <label for="popular-service-1-title">title</label>
                        <br>
                        <input type="text" id="popular-service-2-title" name="popular_service_2_title"
                            value="<?= $popular_service_2_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-2-text">text</label>
                        <br>
                        <textarea name="popular_service_2_text"
                            id="popular-service-2-text"><?= $popular_service_2_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_2">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 3</h3>
                    <div>
                        <label for="popular-service-3-title">title</label>
                        <br>
                        <input type="text" id="popular-service-3-title" name="popular_service_3_title"
                            value="<?= $popular_service_3_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-3-text">text</label>
                        <br>
                        <textarea name="popular_service_3_text"
                            id="popular-service-3-text"><?= $popular_service_3_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_3">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 4</h3>
                    <div>
                        <label for="popular-service-4-title">title</label>
                        <br>
                        <input type="text" id="popular-service-4-title" name="popular_service_4_title"
                            value="<?= $popular_service_4_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-1-text">text</label>
                        <br>
                        <textarea name="popular_service_4_text"
                            id="popular-service-4-text"><?= $popular_service_4_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_4">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 5</h3>
                    <div>
                        <label for="popular-service-1-title">title</label>
                        <br>
                        <input type="text" id="popular-service-5-title" name="popular_service_5_title"
                            value="<?= $popular_service_5_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-1-text">text</label>
                        <br>
                        <textarea name="popular_service_5_text"
                            id="popular-service-5-text"><?= $popular_service_5_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_5">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="popular-services-container">
            <form action="backend/update_popular_services.php">
                <div style="display:flex; flex-direction:column; align-items:center; gap:20px">
                    <h3>POPULAR SERVICE 6</h3>
                    <div>
                        <label for="popular-service-1-title">title</label>
                        <br>
                        <input type="text" id="popular-service-6-title" name="popular_service_6_title"
                            value="<?= $popular_service_6_title ?>">
                    </div>
                    <div>
                        <label for="popular-service-1-text">text</label>
                        <br>
                        <textarea name="popular_service_6_text"
                            id="popular-service-6-text"><?= $popular_service_6_text ?></textarea>
                    </div>
                    <button type="submit" name="submit_popular_service_6">SAVE</button>
                </div>
            </form>
        </div>
        <br>
        <br>
    </section>
</body>

</html>