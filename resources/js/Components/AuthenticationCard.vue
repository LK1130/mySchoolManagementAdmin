<template>
    <div class="min-h-screen shadow-xl  flex flex-col justify-center items-center background">
        <!-- <div>
            <slot name="logo" />
        </div> -->
        <!-- w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg  -->
        <div class=" flex flex-col items-center p-10 md:shadow-lg md:bg-secondaryBackground rounded-3xl ">
            
                <img src="../../../public/img/Adlogo.png" alt="" class="mt-6 w-20 md:block hidden">
                <img src="../../../public/img/Adlogo.png" alt="" class="mt-6 w-16 block md:hidden">
                <h3 class="my-3 text-3xl font-bold subpixel-antialiased  text-white md:text-white">My School</h3>
            

            <slot />
        </div>
    </div>
</template>
