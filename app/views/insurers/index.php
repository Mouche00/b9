<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <section class="relative h-full w-full flex justify-center items-center">
        <!-- SHADOW -->
        <div class="absolute w-full h-full bg-black rounded-md z-[-1] translate-y-[12px] translate-x-[10px]"></div>

        <!-- ADD BUTTON -->
        <button type="button" id="add-button" class="w-[4%] h-full bg-hector text-white text-5xl flex justify-center items-center rounded-l-md">
            <h1>+</h1>
        </button>

        <!-- TABLE -->
        <div class="w-[96%] h-full bg-white rounded-r-md">
            <table class="text-white text-center rounded border border-separate border-tools-table-outline border-hector border-2 w-[94%] m-auto mt-[3%]">
                <thead class="h-8">
                    <th class="rounded-tl-sm bg-hector">ID</th>
                    <th class="bg-hector">NAME</th>
                    <th class="bg-hector">ADDRESS</th>
                    <th class="rounded-tr-sm bg-hector">ACTIONS</th>
                </thead>
                <tbody class="rounded-b-sm text-black">
                    <!-- CONTENT ADDED BY AJAX -->
                </tbody>
            </table>
        </div>
    </section>
</main>

<div id="overlay" class="absolute w-full h-full bg-black opacity-0 z-[-1]"></div>

<section id="form-container" class="absolute flex flex-col justify-center items-center opacity-0 z-[-1] translate-y-[calc(-50%+50vh)] translate-x-[calc(-50%+50vw)]">
    <form id="form" class="relative bg-white flex flex-col justify-center items-center border-2 border-hector rounded" action="" method="post">

        <!-- TITLE -->
        <h1 id="form-name" class="w-full h-full p-4 bg-hector text-white text-3xl text-center font-extrabold"></h1>

        <!-- INPUTS -->
        <input id="id" class="p-1 border-2 border-black rounded" name="id" type="hidden">

        <div class="p-8 flex flex-col justify-center items-center">
            <div class="w-full m-4 flex justify-between items-center">
                <label for="name" class="text-xl">Name:</label>
                <input id="name" class="p-1 border-2 border-black rounded" name="name" type="text">
            </div>
            <div  class="w-full m-4 flex justify-between items-center">
                <label for="address" class="text-xl">Address:</label>
                <input id="address" class="p-1 border-2 border-black rounded" name="address" type="text">
            </div>
            <input id="submit"  class="mt-4 p-2 px-8 bg-hector text-white text-xl rounded" name="submit" type="submit" value="SUBMIT">
        </div>

        <!-- SHADOW -->
        <div class="absolute w-full h-full p-8 bg-black rounded-md z-[-1] translate-y-[12px] translate-x-[10px]"></div>
    </form>
    
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>