<!DOCTYPE html>
<html>
<head>
    <title>Laravel Excel Form</title>
    <style>
        @font-face {
            font-family: 'Proxima Nova';
            color: #1355a6;
            src: url('path-to-your-fonts/proximanova-regular.woff2') format('woff2'),
                 url('path-to-your-fonts/proximanova-regular.woff') format('woff');
        }

        body {
            font-family: 'Proxima Nova', sans-serif;
            
            background-color: #1355a6; 
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            color: white; 
            font-weight: bold;
            margin: 0; 
            padding: 10px 0;
        }

        form {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }

        .form-group {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 180px;
            vertical-align: top;
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1.2rem;
            border: 1px solid #ccc;
            background-color: white; 
        }

        select {
            width: 100%;
            padding: 0.5rem;
            font-size: 1.2rem;
            background-color: white; 
        }

   
        input[type="checkbox"] {
            vertical-align: middle;
        }

        button {
            display: block;
            margin: 1rem auto; 
            background-color: #1355a6;
            color: white; 
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #4169E1; 
        }
    </style>
</head>
<body>
    <?php if(session('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div>
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <div class="header-container">
       
        <h1>STAFF TRAININGS MODULE</h1>

    </div>
    <?php if(isset($form) && $form->id): ?>
        <form method="get" action="<?php echo e(route('form.edit', $form->id)); ?>" style="text-align: right;">
            <button type="submit">Edit</button>
        </form>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('form.submit')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group" name="staff_name">
            <label for="staff_name">Staff Name(s)</label>
            <input type="text" name="staff_name[]" class="form-control">
            <input type="text" name="staff_name[]" class="form-control">
            <input type="text" name="staff_name[]" class="form-control">
            <input type="text" name="staff_name[]" class="form-control">
        </div>

        <div class="form-group">
            <label for="training_title">Title of Training</label>
            <input type="text" name="training_title" required class="form-control">
        </div>

        <div class="form-group">
            <label for="sponsor">Sponsor</label>
            <input type="text" name="sponsor" required class="form-control">
        </div>

        <div class="form-group">
            <label for="date_from">Date From:</label>
            <input type="date" name="date_from" required class="form-control">
        </div>

        <div class="form-group">
            <label for="date_to">Date To:</label>
            <input type="date" name="date_to" required class="form-control">
        </div>

        <div class="form-group">
            <label for="hours">Hours</label>
            <input type="number" name="hours" required class="form-control">
        </div>

        <div class="form-group">
            <label for="type_of_LD">Status</label>
            <select name="type_of_LD" required class="form-control">
                <option value="managerial">Managerial</option>
                <option value="supervisory">Supervisory</option>
                <option value="technical">Technical</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="N/A">
        </div>

        <button type="submit" class="btn btn-primary" onclick="showPrompt()">Submit and Export</button>

    </form>

    <script>
        function showPrompt() {
            alert('Your data has been submitted successfully!');
        }
    </script>
</body>
</html><?php /**PATH C:\Users\User\Downloads\trainingsphp2\resources\views/form.blade.php ENDPATH**/ ?>