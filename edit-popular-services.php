<?php

    require_once 'backend/db.php';
    require_once 'backend/display_popular_services.php';

    // $popular_services_query = "SELECT * FROM popular_services ";
    // $popular_services_result = mysqli_query($conn, $popular_services_query);
    
    // while ($popular_services = mysqli_fetch_assoc($popular_services_result));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Popular Services</title>

    <style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        padding-top: 100px;
    }

    .edit-services-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 40vw;
        border: 1px solid #000;
        border-radius: 5px;
        padding: 20px 0;
    }

    .edit-services-container form {
        width: 100%;
        height: 100%;
    }

    .edit-services-container form div div,
    label,
    input,
    textarea {
        width: 90%;
        font-size: 24px;
    }

    .edit-services-container form div button {
        width: 50%;
        font-size: 24px;
        padding: 8px 0;
    }

    .edit-services-container form div button:hover {
        cursor:pointer;
    }

    .edit-services-container form div div input, textarea {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <section>
        <div class="edit-services-container">
            <form action="backend/update_popular_services.php" method="POST">
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
        <div class="edit-services-container">
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
        <div class="edit-services-container">
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
        <div class="edit-services-container">
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
        <div class="edit-services-container">
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
        <div class="edit-services-container">
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
        <div class="edit-services-container">
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