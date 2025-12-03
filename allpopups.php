<?php
require_once('database.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
    <h2 class="mb-4 text-center">All Popups</h2>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($conn) {
                    $queryy = "SELECT * FROM popup";
                    if ($conn->query($queryy)) {
                        $result = $conn->query($queryy);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $title = $row['heading'];
                                $status = $row['active'];
                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <form id="myForm_<?php echo $id; ?>" method="post" class="mb-0">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="active_<?php echo $id; ?>" name="status" value="1" class="form-check-input"
                                                    <?php if ($status == 1) echo 'checked'; ?>>
                                                <label class="form-check-label" for="active_<?php echo $id; ?>">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="inactive_<?php echo $id; ?>" name="status" value="0" class="form-check-input"
                                                    <?php if ($status == 0) echo 'checked'; ?>>
                                                <label class="form-check-label" for="inactive_<?php echo $id; ?>">Not Active</label>
                                            </div>
                                            <input type="hidden" name="idd" value="<?php echo $id; ?>">
                                        </form>
                                    </td>
                                </tr>
                <?php
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const allForms = document.querySelectorAll('form[id^="myForm_"]');

    allForms.forEach(form => {
        const radioButtons = form.querySelectorAll('input[name="status"]');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', () => {
                const formData = new FormData(form);
                fetch('updatepopup.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Server Response:', data);
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
});
</script>
