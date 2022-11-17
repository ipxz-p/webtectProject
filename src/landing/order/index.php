<?php
session_start();
include_once('../../services/connection.php');
// $query_cart = $con->
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goody goody</title>
    <script src="https://kit.fontawesome.com/ee33cce78a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="../../assets/style/global.css">

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
</head>

<body>
    <?php
    include('../../component/navbar.php')
    ?>
    <div class="pt-[70px] sm:pt-[80px]">
        <div class="palm-container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] ">
                <div class="md:col-span-2">
                    <div class="border-2 p-3 rounded bg-white">
                        <div class=" font-medium text-xl">ตะกร้าสินค้า</div>
                        <?php
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $q = $con->prepare("SELECT SUM(cost * number) FROM cart WHERE user_email=?");
                            $q->execute([$email]);
                            $sum = $q->fetchAll();
                        }
                        $stmt = $con->prepare("SELECT * FROM cart WHERE EXISTS (SELECT id FROM product WHERE cart.product_id = product.id and cart.user_email = ?)");
                        if (isset($_SESSION['email'])) {
                            $stmt->execute([$email]);
                        }
                        $result = $stmt->fetchAll();
                        $countRow = 0;
                        foreach($result as $row){
                            $countRow++;
                        }
                        if ($countRow == 0) { ?>
                            <div class="text-center text-gray-500 my-4 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" width="306" height="206" class=" illustration styles_illustrationTablet__1DWOa"><g id="_461_easter_bunny_flatline" data-name="#461_easter_bunny_flatline"><path d="M180.5,143.05a37.69,37.69,0,0,1-6.67-5.46c-7.06-7.64-9-19.72-17.73-25.33A96.84,96.84,0,0,1,148,132.12a46.07,46.07,0,0,0,35.79,28.76,21.39,21.39,0,0,0,10.43-.64c5-1.87,8.26-5.67,2.8-8.42C191.4,149,185.77,146.6,180.5,143.05Z" fill="#000000"></path><path d="M188.2,161.73a31.81,31.81,0,0,1-4.47-.35,46.88,46.88,0,0,1-36.19-29.08.51.51,0,0,1,0-.42,96.58,96.58,0,0,0,8.05-19.75.47.47,0,0,1,.31-.33.49.49,0,0,1,.44,0c5.18,3.31,8,8.89,10.81,14.29,2,3.91,4.08,7.94,7,11.12a37.28,37.28,0,0,0,6.58,5.39,97.13,97.13,0,0,0,12.12,6.6c1.45.7,2.9,1.4,4.35,2.13,2.68,1.35,3.17,2.88,3.11,3.92-.11,2-2.39,4.09-6,5.41A17.37,17.37,0,0,1,188.2,161.73Zm-39.64-29.57a45.86,45.86,0,0,0,35.31,28.23c4.19.6,7.42.4,10.19-.62,3.13-1.17,5.21-3,5.3-4.54.08-1.35-1.35-2.36-2.56-3-1.44-.73-2.89-1.43-4.33-2.12a99.79,99.79,0,0,1-12.25-6.67h0a39.1,39.1,0,0,1-6.76-5.54c-3-3.28-5.13-7.38-7.17-11.34-2.72-5.31-5.3-10.34-9.9-13.53A98,98,0,0,1,148.56,132.16Z" fill="#231f20"></path><path d="M175.88,147.43c-2.78-.35-5.78-.92-7.69-3-1.08-1.17-1.7-2.72-2.8-3.88-2.41-2.54-6.34-2.59-9.82-2.86A48.12,48.12,0,0,1,138,132.9l-.58,22.53c.05-1.75,13.3.58,14.53,1,4.61,1.48,7.17,4.83,12.18,5.52a62.49,62.49,0,0,0,28.34-2.64c2.54-.84,9.35-2.25,10.83-4.77,2-3.33-1.49-6.22-4.61-6.73-3-.48-6.18.32-9.14.47A77.46,77.46,0,0,1,175.88,147.43Z" fill="#000000"></path><path d="M172.61,163a62.27,62.27,0,0,1-8.53-.59,18,18,0,0,1-7.2-3,23.23,23.23,0,0,0-5.06-2.53c-1.7-.54-12.74-2.25-13.89-1.36a.53.53,0,0,1-.5.41.5.5,0,0,1-.49-.51h0l.58-22.53a.52.52,0,0,1,.25-.42.49.49,0,0,1,.47,0,47.79,47.79,0,0,0,17.36,4.76l.9.07c3.24.22,6.92.48,9.25,2.95a12.67,12.67,0,0,1,1.49,2,12.16,12.16,0,0,0,1.32,1.84c1.83,2,4.77,2.49,7.39,2.83h0a78.29,78.29,0,0,0,13.6.81c1-.05,1.93-.17,3-.29a22.75,22.75,0,0,1,6.27-.17,7.16,7.16,0,0,1,5.22,3.57,4,4,0,0,1-.26,3.9c-1.29,2.2-5.86,3.49-9.2,4.44-.75.21-1.4.39-1.9.56A63.66,63.66,0,0,1,172.61,163Zm-32.68-8.71a70.82,70.82,0,0,1,12.19,1.63,23.45,23.45,0,0,1,5.28,2.63,17,17,0,0,0,6.82,2.87,62.22,62.22,0,0,0,28.12-2.62c.5-.17,1.17-.36,1.94-.58,2.81-.79,7.52-2.13,8.61-4a3,3,0,0,0,.21-3,6.16,6.16,0,0,0-4.47-3,22,22,0,0,0-6,.17c-1,.12-2,.25-3,.3a79.26,79.26,0,0,1-13.78-.82h0c-2.79-.36-5.94-.92-8-3.14a13,13,0,0,1-1.44-2,12.06,12.06,0,0,0-1.36-1.88c-2.07-2.19-5.39-2.42-8.6-2.65l-.9-.06a49,49,0,0,1-17-4.52L138,154.47A8.79,8.79,0,0,1,139.93,154.3Z" fill="#231f20"></path><path d="M140.26,187a70.29,70.29,0,0,1,15.85,14.31c2.95,3.79,7.15,10,8.5,14.64,1-.66,2-1.42,3.07-2.13a25.6,25.6,0,0,0-1.69-3.34c-3.93-6.61-14.28-22-28-27.26a13.15,13.15,0,0,0-.84,2.32A10.16,10.16,0,0,1,140.26,187Z" fill="#fff"></path><path d="M164.61,216.49l-.18,0a.52.52,0,0,1-.3-.33c-1.26-4.31-5.17-10.3-8.41-14.47A69.18,69.18,0,0,0,140,187.46h0a9.86,9.86,0,0,0-3-1.4.48.48,0,0,1-.31-.23.46.46,0,0,1-.05-.38,13.81,13.81,0,0,1,.87-2.42.51.51,0,0,1,.63-.24c14,5.34,24.43,21,28.28,27.48a27.86,27.86,0,0,1,1.72,3.4.49.49,0,0,1-.18.6l-1,.73c-.68.48-1.36,1-2.05,1.41A.56.56,0,0,1,164.61,216.49Zm-24.07-29.86a70.11,70.11,0,0,1,16,14.42c3.15,4,6.92,9.78,8.39,14.17l1.47-1,.7-.5a24.44,24.44,0,0,0-1.5-2.91c-3.75-6.33-13.88-21.5-27.35-26.89a11.37,11.37,0,0,0-.47,1.35,11.06,11.06,0,0,1,2.8,1.39Z" fill="#231f20"></path><path d="M155.75,181.44S145,180.29,140.26,187h-8.6s2.66-5.76,11.11-8.57,14.54,0,14.54,0Z" fill="#fff"></path><path d="M140.26,187.54h-8.6a.52.52,0,0,1-.42-.23.51.51,0,0,1,0-.48c.11-.24,2.85-6,11.4-8.84s14.65-.09,14.91,0a.51.51,0,0,1,.26.3.53.53,0,0,1,0,.39l-1.56,3a.52.52,0,0,1-.5.26c-.1,0-10.55-1-15,5.39A.48.48,0,0,1,140.26,187.54Zm-7.74-1H140c4.44-6.09,13.55-5.76,15.45-5.63l1.15-2.18a21.37,21.37,0,0,0-13.69.21A19.35,19.35,0,0,0,132.52,186.54Z" fill="#231f20"></path><path d="M143.77,202.15a12.73,12.73,0,0,1-2.58,1.7,10.5,10.5,0,0,1-1.27.54,9.85,9.85,0,0,1-1.77.42,8.25,8.25,0,0,1-2.22,0,9.75,9.75,0,0,1-6.23-3.71,10.59,10.59,0,0,1-2.33-5,8.36,8.36,0,0,1-.07-2h0a8.53,8.53,0,0,1,.47-2.24,9.44,9.44,0,0,1,.49-1.15,12,12,0,0,1,3.1-3.77,17.4,17.4,0,0,1,4-2.47,8.41,8.41,0,0,1,.87-.37c4.63-1.84,9.81-1.73,12.3,1.33s1.58,8.34-1.16,12.63c-.16.26-.34.52-.52.77A17.37,17.37,0,0,1,143.77,202.15Z" fill="#000000"></path><path d="M142.16,182.87a7.9,7.9,0,0,1,6.34,2.54c2.52,3.09,1.58,8.34-1.16,12.63-.16.26-.34.52-.52.77a17.37,17.37,0,0,1-3,3.34,13.17,13.17,0,0,1-2.58,1.7,10.5,10.5,0,0,1-1.27.54,9.85,9.85,0,0,1-1.77.42,8.68,8.68,0,0,1-1.13.07,7.88,7.88,0,0,1-1.09-.07,9.75,9.75,0,0,1-6.23-3.71,10.59,10.59,0,0,1-2.33-5,8.36,8.36,0,0,1-.07-2h0a8.53,8.53,0,0,1,.47-2.24,9.44,9.44,0,0,1,.49-1.15,12,12,0,0,1,3.1-3.77,17.4,17.4,0,0,1,4-2.47,8.41,8.41,0,0,1,.87-.37,16.47,16.47,0,0,1,6-1.21m0-1h0a17.35,17.35,0,0,0-6.33,1.28c-.31.12-.62.25-.92.39a18.16,18.16,0,0,0-4.19,2.61,13,13,0,0,0-3.35,4.09,10.15,10.15,0,0,0-.55,1.27,10,10,0,0,0-.52,2.46v.08a8.88,8.88,0,0,0,.09,2.18,11.54,11.54,0,0,0,2.53,5.5,10.66,10.66,0,0,0,6.88,4.07,8.24,8.24,0,0,0,1.22.08,9.55,9.55,0,0,0,3.22-.55,11.19,11.19,0,0,0,1.4-.58,14.41,14.41,0,0,0,2.77-1.83,18.56,18.56,0,0,0,3.23-3.53c.19-.26.37-.53.55-.81,3.74-5.86,3.24-11.16,1.08-13.8-1.52-1.88-4.05-2.91-7.11-2.91Z" fill="#231f20"></path><path d="M146.82,198.81a2.9,2.9,0,0,0-2.54-.15,4,4,0,0,1-1.73.58,1.39,1.39,0,0,1-1.25-1.06,2.25,2.25,0,0,1,.24-1.66,5.37,5.37,0,0,1,.62-.88,2.71,2.71,0,0,0,.56-.79c.17-.62-.86-.4-1.13-.27a7.79,7.79,0,0,1-1.63.76,1.76,1.76,0,0,1-2.06-1.82c-.06-1.37.94-2.3,1.51-3.46.06-.12.17-.29.09-.4s-.28-.13-.38-.14a2.28,2.28,0,0,0-.78.07,7.79,7.79,0,0,0-1.65.72c-.88.44-2.43,1.25-3.07.07s.23-2.39.9-3.27a4.31,4.31,0,0,0,1-1.74,1.22,1.22,0,0,0-.17-.92,8.41,8.41,0,0,1,.87-.37,2.8,2.8,0,0,1-.16,2.39c-.36.67-.88,1.21-1.28,1.85-.22.36-.81,1.62-.09,1.75.52.1,1.21-.37,1.66-.6a11,11,0,0,1,1.65-.72,2.82,2.82,0,0,1,1.7-.05,1.08,1.08,0,0,1,.71,1.34c-.34,1.19-1.68,2.11-1.58,3.44,0,.51.31,1,.9,1a7,7,0,0,0,1.69-.79,1.84,1.84,0,0,1,1.57,0,1.2,1.2,0,0,1,.65,1.32c-.14.63-.72,1.11-1.08,1.62s-.66,1.18-.2,1.6,1.09-.16,1.47-.34a3.84,3.84,0,0,1,3.53.17C147.18,198.3,147,198.56,146.82,198.81Z" fill="#fff"></path><path d="M141.19,203.85a10.5,10.5,0,0,1-1.27.54,18.39,18.39,0,0,1-4-2.12,20,20,0,0,1-4.7-4.74,33.86,33.86,0,0,1-3.43-5.69,9.44,9.44,0,0,1,.49-1.15c.27.63.56,1.25.88,1.85a33.08,33.08,0,0,0,3.66,5.55,17.62,17.62,0,0,0,4.49,4A17.37,17.37,0,0,0,141.19,203.85Z" fill="#fff"></path><path d="M138.15,204.81a8.25,8.25,0,0,1-2.22,0,19.1,19.1,0,0,1-2-1.2,20.38,20.38,0,0,1-4.7-4.75c-.65-.9-1.28-1.83-1.87-2.78a8.36,8.36,0,0,1-.07-2,34.19,34.19,0,0,0,3.54,5.35,17.82,17.82,0,0,0,4.5,4A17.12,17.12,0,0,0,138.15,204.81Z" fill="#fff"></path><ellipse cx="135.24" cy="194.26" rx="1.06" ry="1.03" transform="translate(-101.02 179.82) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="131.52" cy="193.04" rx="1.06" ry="1.03" transform="translate(-101.47 176.44) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="135.29" cy="198.57" rx="1.06" ry="1.03" transform="translate(-104.38 181.49) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="143.33" cy="190.52" rx="1.06" ry="1.03" transform="translate(-95.01 184.74) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="139.04" cy="198.93" rx="1.06" ry="1.03" transform="translate(-103.24 184.57) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="148.4" cy="191.11" rx="1.06" ry="1.03" transform="translate(-93.55 188.95) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="144.6" cy="186.45" rx="1.06" ry="1.03" transform="translate(-91.34 184.2) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="141.29" cy="185.72" rx="1.06" ry="1.03" transform="translate(-92.02 181.32) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="141.23" cy="201.62" rx="1.06" ry="1.03" transform="translate(-104.52 187.31) rotate(-51.66)" fill="#fff"></ellipse><ellipse cx="146.32" cy="194.19" rx="1.06" ry="1.03" transform="translate(-96.76 188.48) rotate(-51.66)" fill="#fff"></ellipse><path d="M158.51,219.36a12.91,12.91,0,0,1-4.15,2.23,9.36,9.36,0,0,1-7.08-.57,11,11,0,0,1-2.7-2h0a12.64,12.64,0,0,1-2-2.48h0a11,11,0,0,1-1.26-3,9.09,9.09,0,0,1,1.23-7.25,13.19,13.19,0,0,1,3-3.23,16.93,16.93,0,0,1,1.92-1.29,19.54,19.54,0,0,1,7.53-2.53,15.12,15.12,0,0,1,3.29,0,8.44,8.44,0,0,1,5.06,2.17,5.88,5.88,0,0,1,.53.58,7.33,7.33,0,0,1,.45.64,8.53,8.53,0,0,1,.83,6,14.65,14.65,0,0,1-.51,2,19.06,19.06,0,0,1-3.85,6.53A17.18,17.18,0,0,1,158.51,219.36Z" fill="#fff"></path><path d="M156.85,199.21a14.56,14.56,0,0,1,1.49.08,8.44,8.44,0,0,1,5.06,2.17,5.88,5.88,0,0,1,.53.58,7.33,7.33,0,0,1,.45.64,8.53,8.53,0,0,1,.83,6,14.65,14.65,0,0,1-.51,2,19.06,19.06,0,0,1-3.85,6.53,17.18,17.18,0,0,1-2.34,2.18,12.91,12.91,0,0,1-4.15,2.23,9.79,9.79,0,0,1-2.88.44,9.22,9.22,0,0,1-4.2-1,11,11,0,0,1-2.7-2h0a12.64,12.64,0,0,1-2-2.48h0a11,11,0,0,1-1.26-3,9.09,9.09,0,0,1,1.23-7.25,13.19,13.19,0,0,1,3-3.23,16.93,16.93,0,0,1,1.92-1.29,19.54,19.54,0,0,1,7.53-2.53,15.8,15.8,0,0,1,1.8-.11m0-1h0a17.91,17.91,0,0,0-1.91.11A20.77,20.77,0,0,0,147,201a22,22,0,0,0-2,1.37,14.31,14.31,0,0,0-3.25,3.48,10,10,0,0,0-1.36,8,11.59,11.59,0,0,0,1.38,3.24,12.25,12.25,0,0,0,1,1.41,14,14,0,0,0,1.15,1.27,11.94,11.94,0,0,0,3,2.13,10.31,10.31,0,0,0,4.65,1.12,10.69,10.69,0,0,0,3.18-.49,14,14,0,0,0,4.47-2.39,19,19,0,0,0,2.46-2.31,20,20,0,0,0,4.06-6.87,14.22,14.22,0,0,0,.54-2.11,9.46,9.46,0,0,0-1-6.7,7.2,7.2,0,0,0-.52-.75,6.47,6.47,0,0,0-.61-.67,9.43,9.43,0,0,0-5.65-2.44,13.91,13.91,0,0,0-1.6-.09Z" fill="#231f20"></path><path d="M152.21,202.77c-2,.84-4.11.5-4.63-.77a.94.94,0,0,1-.06-.15,19.54,19.54,0,0,1,7.53-2.53C155.23,200.53,154.05,202,152.21,202.77Z" fill="#000000"></path><ellipse cx="149.4" cy="207.39" rx="3.99" ry="2.48" transform="translate(-95.24 133.33) rotate(-37.39)" fill="#000000"></ellipse><path d="M163.4,201.46a8.19,8.19,0,0,1-.91.16c-2.19.21-4.05-.73-4.15-2.1a.89.89,0,0,1,0-.23A8.44,8.44,0,0,1,163.4,201.46Z" fill="#000000"></path><path d="M165.21,208.68c-1.25-.39-1.92-2.21-1.5-4.23a5.66,5.66,0,0,1,.67-1.77A8.53,8.53,0,0,1,165.21,208.68Z" fill="#000000"></path><ellipse cx="154.8" cy="215.41" rx="3.99" ry="2.48" transform="translate(-99 138.26) rotate(-37.39)" fill="#000000"></ellipse><ellipse cx="158" cy="206.63" rx="3.99" ry="2.48" transform="translate(-93.01 138.4) rotate(-37.39)" fill="#000000"></ellipse><path d="M147.56,217.89a5.28,5.28,0,0,1-3,1.18h0a12.64,12.64,0,0,1-2-2.48h0a5.17,5.17,0,0,1,1.87-2.59c1.74-1.35,3.84-1.57,4.7-.5S149.3,216.54,147.56,217.89Z" fill="#000000"></path><path d="M141.34,213.62a9.09,9.09,0,0,1,1.23-7.25,1.33,1.33,0,0,1,.34.1c1.29.51,1.64,2.54.78,4.54A4.93,4.93,0,0,1,141.34,213.62Z" fill="#000000"></path><path d="M154.36,221.59a9.36,9.36,0,0,1-7.08-.57,5.12,5.12,0,0,1,3.25-1.15C152.35,219.82,153.89,220.55,154.36,221.59Z" fill="#000000"></path><path d="M160.85,217.18c-.64-.92-.53-2.57.35-4.1s2.34-2.52,3.5-2.43A19.06,19.06,0,0,1,160.85,217.18Z" fill="#000000"></path><path d="M152.36,210.86a12.36,12.36,0,0,1-3.27,3.08,8.57,8.57,0,0,1-6.62,1.14,10.21,10.21,0,0,1-2.94-1.21h0a11.24,11.24,0,0,1-1.26-.86,12.49,12.49,0,0,1-1.15-1h0a10.56,10.56,0,0,1-1.86-2.5,9,9,0,0,1-.61-7.13,12.76,12.76,0,0,1,2-3.77,17.63,17.63,0,0,1,1.46-1.67,18,18,0,0,1,6.29-4.17,13.49,13.49,0,0,1,3-.8,7.8,7.8,0,0,1,5.16.85,4.14,4.14,0,0,1,.61.42,4.53,4.53,0,0,1,.57.5,8.5,8.5,0,0,1,2.2,5.47,14.51,14.51,0,0,1,0,2,18.57,18.57,0,0,1-2,7.07A16.57,16.57,0,0,1,152.36,210.86Z" fill="#000000"></path><path d="M148.82,191.85a7.12,7.12,0,0,1,3.73,1,4.14,4.14,0,0,1,.61.42,5.51,5.51,0,0,1,.57.5,8.5,8.5,0,0,1,2.2,5.47,14.51,14.51,0,0,1,0,2,18.57,18.57,0,0,1-2,7.07,16.57,16.57,0,0,1-1.61,2.62,12.36,12.36,0,0,1-3.27,3.08,8.69,8.69,0,0,1-4.63,1.37,8.94,8.94,0,0,1-2-.23,10.21,10.21,0,0,1-2.94-1.21h0a11.24,11.24,0,0,1-1.26-.86,12.49,12.49,0,0,1-1.15-1h0a10.56,10.56,0,0,1-1.86-2.5,9,9,0,0,1-.61-7.13,12.76,12.76,0,0,1,2-3.77,17.63,17.63,0,0,1,1.46-1.67,18,18,0,0,1,6.29-4.17,13.49,13.49,0,0,1,3-.8,9.92,9.92,0,0,1,1.43-.1m0-1h0a10.54,10.54,0,0,0-1.57.11,13.76,13.76,0,0,0-3.22.86,19.28,19.28,0,0,0-6.65,4.39,18,18,0,0,0-1.53,1.78,13.73,13.73,0,0,0-2.16,4.07,10,10,0,0,0,.68,7.9,11.84,11.84,0,0,0,2,2.74,14.53,14.53,0,0,0,1.24,1.1,14.89,14.89,0,0,0,1.36.93,11.23,11.23,0,0,0,3.24,1.32,9.74,9.74,0,0,0,2.21.26,9.6,9.6,0,0,0,5.16-1.52,13.5,13.5,0,0,0,3.54-3.33,18.18,18.18,0,0,0,1.71-2.77,19.7,19.7,0,0,0,2.06-7.46,15,15,0,0,0,0-2.12,9.43,9.43,0,0,0-2.49-6.09,6.17,6.17,0,0,0-.66-.59,5.71,5.71,0,0,0-.72-.49,8.09,8.09,0,0,0-4.24-1.09Z" fill="#231f20"></path><path d="M142.61,196.68c-1.67,1.28-3.65,1.44-4.43.37l-.08-.13a18,18,0,0,1,6.29-4.17C144.84,193.85,144.11,195.52,142.61,196.68Z" fill="#fff"></path><ellipse cx="141.15" cy="201.71" rx="3.82" ry="2.39" transform="translate(-104.97 195.93) rotate(-53.67)" fill="#fff"></ellipse><path d="M152.55,192.8a6.47,6.47,0,0,1-.8.36c-1.95.72-3.88.27-4.31-1a1.6,1.6,0,0,1-.05-.21A7.8,7.8,0,0,1,152.55,192.8Z" fill="#fff"></path><path d="M155.93,199.19c-1.23-.07-2.28-1.64-2.39-3.64a6,6,0,0,1,.19-1.83A8.5,8.5,0,0,1,155.93,199.19Z" fill="#fff"></path><ellipse cx="148.01" cy="208.01" rx="3.82" ry="2.39" transform="translate(-107.25 204.02) rotate(-53.67)" fill="#fff"></ellipse><ellipse cx="148.84" cy="198.96" rx="3.82" ry="2.39" transform="translate(-99.62 201.01) rotate(-53.67)" fill="#fff"></ellipse><path d="M142,212.05a4.85,4.85,0,0,1-2.44,1.82h0a11.24,11.24,0,0,1-1.26-.86,12.49,12.49,0,0,1-1.15-1h0a5.11,5.11,0,0,1,1.09-2.88c1.27-1.68,3.14-2.39,4.18-1.58S143.24,210.37,142,212.05Z" fill="#fff"></path><path d="M135.26,209.49a9,9,0,0,1-.61-7.13,1.22,1.22,0,0,1,.33,0c1.3.18,2.11,2,1.8,4.11A4.79,4.79,0,0,1,135.26,209.49Z" fill="#fff"></path><path d="M149.09,213.94a8.57,8.57,0,0,1-6.62,1.14,4.71,4.71,0,0,1,2.7-1.85C146.82,212.75,148.41,213.07,149.09,213.94Z" fill="#fff"></path><path d="M154,208.24a4.06,4.06,0,0,1-.65-4c.45-1.69,1.54-2.93,2.62-3.12A18.57,18.57,0,0,1,154,208.24Z" fill="#fff"></path><path d="M129.79,187S118,193.88,112,216.15c0,0,1.12,12.39,17.11,20.89,0,0,15.09,2.39,34.34-11,0,0-11.16,1.68-24.39-14.36S129.79,187,129.79,187Z" fill="#231f20"></path><path d="M131.87,237.69a20.1,20.1,0,0,1-2.88-.16.3.3,0,0,1-.16-.05c-16-8.52-17.36-21.16-17.37-21.28a.55.55,0,0,1,0-.18c6.06-22.22,17.57-29.13,18.06-29.41a.48.48,0,0,1,.58.06.51.51,0,0,1,.12.58c0,.09-3.66,8.58,9.16,24.13,6.73,8.16,12.89,11.58,16.87,13a16.16,16.16,0,0,0,7.06,1.16.5.5,0,0,1,.36.91C149.39,236.41,137.21,237.69,131.87,237.69Zm-2.65-1.13c1.17.15,15,1.6,32.5-10-3.7-.18-12.75-2-23.09-14.59s-10.32-20.64-9.72-23.75c-3,2.35-11.59,10.23-16.44,27.93C112.61,217.28,114.45,228.66,129.22,236.56Zm.57-49.52h0Z" fill="#231f20"></path><path d="M250.35,207.71s17.31-8.05,22.63,2.4c2.6,5.1,2.6,15,2.6,15s9.74-9.77,13.46-1.64-8.94,28-21.47,25.51-4.2-15.55-9.92-20.91-22.93-6.3-22.93-6.3L246.91,209" fill="#fff"></path><path d="M269.72,249.7a11.29,11.29,0,0,1-2.25-.22c-7.88-1.57-7.92-7.31-8-12.37,0-3.42-.05-6.65-2.21-8.66-5.53-5.18-22.44-6.16-22.61-6.17a.49.49,0,0,1-.44-.31.51.51,0,0,1,.1-.53l12.2-12.82a.5.5,0,0,1,.71,0,.49.49,0,0,1,0,.7l-11.46,12.06c3.89.3,17.15,1.65,22.18,6.36,2.46,2.3,2.49,5.9,2.51,9.38.05,5.14.08,10,7.17,11.4,5.16,1,11.1-1.95,15.87-8s6.8-13,5-16.83a4.5,4.5,0,0,0-3.22-2.88c-4-.72-9.38,4.61-9.43,4.66a.5.5,0,0,1-.86-.35c0-.1,0-9.85-2.54-14.79-5-9.9-21.81-2.25-22-2.17a.5.5,0,0,1-.66-.24.49.49,0,0,1,.24-.66,37.19,37.19,0,0,1,9.46-2.76c6.76-1,11.54.9,13.82,5.38,2.14,4.19,2.56,11.35,2.64,14.12,1.75-1.55,5.94-4.81,9.49-4.17a5.42,5.42,0,0,1,3.94,3.45c1.94,4.22-.19,11.57-5.17,17.86C280,246.63,274.67,249.7,269.72,249.7Z" fill="#231f20"></path><path d="M247.85,162.67S278,160.81,287.15,151s8.85-15.07,3.9-20.83a11.73,11.73,0,0,0-7.61-4.4c-3-.25-6.26,1.52-7,4.43-.44,1.71-.08,3.76-1.3,5a4.83,4.83,0,0,1-1.45.94c-10.29,5-21.72,8.07-33,4.89" fill="#fff"></path><path d="M247.85,163.17a.5.5,0,0,1,0-1c.3,0,30-2,39-11.5,9.25-9.88,8.43-14.87,3.88-20.16a11.17,11.17,0,0,0-7.27-4.24c-2.56-.22-5.77,1.28-6.48,4.07a11,11,0,0,0-.25,1.71,5.57,5.57,0,0,1-1.17,3.54,5.16,5.16,0,0,1-1.6,1.05c-12.63,6.08-23.54,7.69-33.38,4.92a.49.49,0,0,1-.34-.61.5.5,0,0,1,.61-.35c9.59,2.7,20.28,1.11,32.68-4.85a4.48,4.48,0,0,0,1.31-.85,4.77,4.77,0,0,0,.9-2.95,13.24,13.24,0,0,1,.27-1.86c.86-3.33,4.51-5.06,7.53-4.81a12.17,12.17,0,0,1,7.95,4.58c4.79,5.57,5.81,11.11-3.91,21.49-9.21,9.83-38.4,11.73-39.64,11.81Z" fill="#231f20"></path><path d="M209,151s-27.22,37.3-21.7,65.45,44.93,20.64,56.19,10.63,19.9-27.84,14.18-50.35A117.43,117.43,0,0,0,239.33,138Z" fill="#fff"></path><path d="M214.63,236.6a37.55,37.55,0,0,1-12-1.81c-8.61-2.9-14.1-9.2-15.87-18.23-5.5-28,21.51-65.46,21.78-65.83a.56.56,0,0,1,.21-.17l30.36-13.05a.5.5,0,0,1,.59.15,119.11,119.11,0,0,1,18.4,39c4.95,19.47-.41,38.48-14.33,50.85C238.57,232.12,226.47,236.6,214.63,236.6Zm-5.33-85.18c-1.61,2.26-26.8,38.09-21.53,65,1.72,8.78,6.84,14.66,15.21,17.48,14.23,4.8,33.29-1,40.16-7.12,13.64-12.13,18.88-30.76,14-49.86a118.25,118.25,0,0,0-18-38.29Z" fill="#231f20"></path><path d="M233.45,158.94c-9.44-1-15,4.36-18.23,13.32-2.56,7.15-3.26,14.93-3.69,22.44s-1.3,14.66,1.76,21.75a11.86,11.86,0,0,0,2.66,4.08,11.3,11.3,0,0,0,5.62,2.6,22.62,22.62,0,0,0,18.25-5,31.27,31.27,0,0,0,10.07-16.37c3.18-12.08,1.34-40-15.11-42.65C234.33,159,233.88,159,233.45,158.94Z" fill="#e6e7e8"></path><path d="M280.89,144.74a5.22,5.22,0,0,1-4.15-1.72c-2.69-3.12-1.31-9.33-1.25-9.59a.49.49,0,0,1,.59-.37.49.49,0,0,1,.38.59c0,.06-1.33,6,1,8.72a4.53,4.53,0,0,0,4,1.35c3-.23,5.11-1.06,6.22-2.41a3.37,3.37,0,0,0,.83-2.36.49.49,0,0,1,.43-.55.49.49,0,0,1,.55.43,4.31,4.31,0,0,1-1,3.09c-1.3,1.6-3.63,2.54-6.94,2.79Z" fill="#231f20"></path><path d="M202.3,222s-3.46,12.64-16.89,6.2-14.6-4.63-14.6-4.63-17.51,20.64-8.44,28.77,16.26-8.13,16.26-8.13A30.11,30.11,0,0,0,204,248.31c15-4.07,16.85-15.78,16.85-15.78" fill="#fff"></path><path d="M167.54,255.15a8.27,8.27,0,0,1-5.51-2.41c-3.89-3.49-3.65-9.73.72-18a71.8,71.8,0,0,1,7.68-11.43c.32-.46,2.44-1.62,15.2,4.5,4.11,2,7.66,2.31,10.55,1,4.23-1.93,5.63-6.83,5.64-6.88a.5.5,0,0,1,.61-.35.5.5,0,0,1,.35.61c-.06.22-1.52,5.39-6.18,7.52-3.17,1.45-7,1.11-11.4-1-11.69-5.61-13.84-4.83-14-4.73-1.1,1.33-16.82,20.56-8.46,28.05,2,1.78,4,2.46,6.05,2,5.47-1.17,9.39-9.89,9.43-10a.51.51,0,0,1,.33-.28.48.48,0,0,1,.43.09,29.87,29.87,0,0,0,24.89,4c14.5-3.93,16.47-15.26,16.49-15.38a.5.5,0,0,1,1,.16c0,.12-2.06,12.08-17.21,16.18a31.12,31.12,0,0,1-25.26-3.8c-1,2-4.69,8.89-9.87,10A6.92,6.92,0,0,1,167.54,255.15Z" fill="#231f20"></path><path d="M219.28,83.65s-2.71-43.48-29.39-50.44-57.63,1.72-52.24,13.54C147.35,68,178.86,51,186.41,56s18.17,30.55,18.17,30.55" fill="#fff"></path><path d="M204.58,87.08a.51.51,0,0,1-.46-.31c-.1-.25-10.66-25.44-18-30.33-2.43-1.62-7.81-.75-14,.25-12,1.93-28.37,4.58-34.9-9.74a6.78,6.78,0,0,1,1.22-7.56c6.55-7.79,30-12.29,51.6-6.66,26.73,7,29.74,50.45,29.76,50.89a.5.5,0,1,1-1,.06c0-.43-3-43.2-29-50-17.17-4.48-43-2.68-50.59,6.34a5.76,5.76,0,0,0-1.07,6.51c6.21,13.62,21.53,11.15,33.83,9.17,6.44-1,12-1.93,14.75-.1,7.58,5.06,17.92,29.73,18.36,30.78a.49.49,0,0,1-.27.65A.58.58,0,0,1,204.58,87.08Z" fill="#231f20"></path><path d="M213.07,75.36S202.81,42,193.43,38.82s-44.66-9.4-42.87,3.46c2.25,16.11,26.31,4.61,34.21,7.74s20,26.33,20,26.33Z" fill="#e6e7e8"></path><path d="M164.61,216c.54,1.86.63,3.47,0,4.54-3.93,6.49-11.42,0-11.42,0s-7.12-4.85-15.88-15.95S130,190.09,131.66,187a17.12,17.12,0,0,1,3.27-3.22,11.22,11.22,0,0,0-4.92,2.11c-4.61,3.49-4,13.18,7.28,25.84s21.92,18.61,27.3,14.7c4.46-3.24,5.23-7.44,3.09-12.61C166.66,214.57,165.65,215.33,164.61,216Z" fill="#fff"></path><path d="M160.66,228.16c-6,0-14.55-5.71-23.74-16.06-7-7.9-10.6-15.38-10-21.06a7.6,7.6,0,0,1,2.84-5.5c2-1.49,4.85-2.39,5.4-2.18a.49.49,0,0,1,.32.39.51.51,0,0,1-.19.46,15.68,15.68,0,0,0-3.14,3.07c-1.52,2.73-3.24,5.81,5.58,17,8.6,10.9,15.7,15.8,15.77,15.85s3.83,3.27,7.22,2.74a5,5,0,0,0,3.5-2.59c.52-.86.51-2.25,0-4.14a.5.5,0,0,1,.21-.56c.68-.43,1.35-.91,2-1.38l1-.74a.52.52,0,0,1,.42-.07.51.51,0,0,1,.32.29c2.32,5.61,1.25,9.93-3.26,13.21A7,7,0,0,1,160.66,228.16ZM132.89,184.9a11.47,11.47,0,0,0-2.58,1.43,6.58,6.58,0,0,0-2.44,4.81c-.52,5.31,3,12.71,9.79,20.3,11.15,12.54,21.6,18.29,26.64,14.63,4-2.89,5-6.54,3.15-11.44l-.52.37c-.58.41-1.16.83-1.74,1.21.53,2,.47,3.51-.17,4.58a6,6,0,0,1-4.2,3.05c-3.84.6-7.81-2.79-8-2.93s-7.23-5-15.94-16c-9.24-11.7-7.26-15.24-5.67-18.09A9.49,9.49,0,0,1,132.89,184.9Z" fill="#231f20"></path><path d="M162.87,184.88s4.38,3.13,5.94,10.32-2.34,16-15.63,25.33c0,0,3.51,4.3,11.25,3,0,0,11.26-11.88,11.58-23.14s-10.09-20.49-10.09-20.49Z" fill="#fff"></path><path d="M161.52,224.26c-5.86,0-8.6-3.25-8.73-3.41a.5.5,0,0,1-.11-.39.54.54,0,0,1,.21-.34c11.81-8.34,17.15-16.92,15.44-24.82-1.5-6.9-5.71-10-5.75-10a.49.49,0,0,1-.13-.66l3.05-5a.5.5,0,0,1,.35-.23.49.49,0,0,1,.4.12c.44.38,10.57,9.51,10.25,20.87s-11.24,23-11.7,23.47a.49.49,0,0,1-.28.15A17.29,17.29,0,0,1,161.52,224.26Zm-7.59-3.66c1,1,4.32,3.4,10.25,2.44,1.17-1.28,11-12.35,11.33-22.69.26-9.59-7.53-17.8-9.48-19.69l-2.51,4.1a18.61,18.61,0,0,1,5.78,10.33C170.55,200.83,168.87,209.9,153.93,220.6Z" fill="#231f20"></path><path d="M210.63,153.92s-20.86,2.18-32.48,7.81S163.4,171,163.4,171s-7.81,4.49-9.69,8.24,1.46,12.51,5.42,13.55,7.74-1.88,7.74-1.88-1.27-3.12,1.23-5,4.59,2.09,4.59,2.09a5.76,5.76,0,0,0,3.32-2.29c1.25-1.88,0-5.85,0-5.85s19.13-10.21,31.46-8.54" fill="#fff"></path><path d="M160.92,193.53a7.54,7.54,0,0,1-1.91-.25c-1.82-.48-3.61-2.39-4.9-5.26-1.17-2.58-2.09-6.49-.84-9,1.84-3.7,9-7.92,9.82-8.41.49-.54,4-4.07,14.85-9.33,11.56-5.61,32.43-7.85,32.64-7.87a.49.49,0,0,1,.55.44.5.5,0,0,1-.44.55c-.21,0-20.91,2.25-32.32,7.77s-14.56,9.12-14.59,9.16a.45.45,0,0,1-.13.1c-.07.05-7.7,4.46-9.49,8-.89,1.78-.55,5.05.85,8.14,1.16,2.55,2.75,4.31,4.25,4.71,3.08.81,6.09-1,7-1.59a4.72,4.72,0,0,1,1.52-5.21A2.68,2.68,0,0,1,170,185a5.31,5.31,0,0,1,2.88,2.44,5.18,5.18,0,0,0,2.68-2c.92-1.38.27-4.38-.06-5.42a.51.51,0,0,1,.24-.59c.79-.42,19.41-10.26,31.76-8.6a.51.51,0,0,1,.43.56.5.5,0,0,1-.56.43c-11.13-1.51-28.14,6.94-30.81,8.31.3,1.1,1,4.16-.17,5.86a6.11,6.11,0,0,1-3.65,2.5.48.48,0,0,1-.53-.25s-1.07-2-2.43-2.29a1.68,1.68,0,0,0-1.42.37c-2.16,1.62-1.11,4.3-1.07,4.42a.5.5,0,0,1-.15.58A11.46,11.46,0,0,1,160.92,193.53Z" fill="#231f20"></path><path d="M202.51,155.14s8.12,16.33,28.62,11.26c18.91-4.67,14.74-24.49,14.74-24.49Z" fill="#000000"></path><path d="M245.87,141.91s4.17,19.82-14.74,24.49a31.64,31.64,0,0,1-7.6,1,24,24,0,0,1-21-12.24l43.36-13.23m0-1a1,1,0,0,0-.29,0l-43.36,13.23a1,1,0,0,0-.63.56,1.05,1.05,0,0,0,0,.85c.06.12,6.54,12.79,21.91,12.79a32.63,32.63,0,0,0,7.84-1c19.62-4.85,15.53-25.46,15.48-25.67a1,1,0,0,0-.47-.65.91.91,0,0,0-.51-.14Z" fill="#231f20"></path><path d="M201.1,72c12.4-2.54,44.86,3.78,53,30,11,35.53-5,45.84-27.84,53.11-34.76,11.07-56.47-2.71-59.37-33.65S186.41,75,201.1,72Z" fill="#fff"></path><path d="M204.31,159.31c-8.32,0-15.57-2-21.45-5.85-9.41-6.22-15.11-17.3-16.48-32C163.49,90.57,185.5,74.65,201,71.48l.1.49-.1-.49c6.18-1.26,17.36-.44,28.39,4.24,9,3.81,20.63,11.42,25.17,26.05,11.66,37.59-7.52,47.15-28.17,53.73A73.27,73.27,0,0,1,204.31,159.31ZM201.2,72.46c-15.15,3.1-36.66,18.67-33.83,48.88,1.35,14.42,6.89,25.24,16,31.29,10.36,6.85,25.11,7.52,42.68,1.92,25.25-8,37.84-19.21,27.52-52.48C249.18,87.8,237.78,80.37,229,76.64c-10.78-4.58-22-5.37-27.8-4.18Z" fill="#231f20"></path><path d="M188.13,85.7S148.82,56.08,130.26,70,92.1,117.64,118,120.61c17.89,2.06,20.49-27.07,29-29.39s33,7.46,33,7.46" fill="#fff"></path><path d="M119.73,121.21a14.47,14.47,0,0,1-1.83-.11c-6.88-.79-11.06-3.73-12.42-8.75C102.34,100.74,115.81,80.21,130,69.6c7.74-5.81,20.33-4.92,36.41,2.58A140.34,140.34,0,0,1,188.43,85.3a.5.5,0,0,1,.1.7.51.51,0,0,1-.7.09c-.39-.29-39.22-29.23-57.28-15.69-13.6,10.2-27.1,30.64-24.1,41.69,1.24,4.58,5.13,7.29,11.56,8,10.67,1.22,15.69-8.92,20.11-17.86,2.8-5.67,5.23-10.57,8.71-11.52,8.57-2.34,32.33,7.08,33.34,7.48a.5.5,0,1,1-.37.93c-.24-.1-24.46-9.7-32.71-7.45-3.05.83-5.38,5.54-8.08,11C134.91,111,129.86,121.21,119.73,121.21Z" fill="#231f20"></path><path d="M185.58,92.36a3.54,3.54,0,0,0-1.52-4.84c-9.34-4.75-36.28-18-43.48-16.07-8.76,2.3-29.4,19.6-28.36,30s7.72,14,13.55,7.92,15.32-22.2,19.49-22.82c3.46-.52,28.09,5.5,36.34,7.55a3.53,3.53,0,0,0,4-1.77Z" fill="#e6e7e8"></path><ellipse cx="207.47" cy="115.26" rx="2.29" ry="5.54" transform="translate(-28.42 89.09) rotate(-22.72)" fill="#231f20"></ellipse><ellipse cx="239.33" cy="101.92" rx="2.29" ry="5.54" transform="translate(-20.79 100.36) rotate(-22.72)" fill="#231f20"></ellipse><path d="M233.17,114.77c.78,1.84-.43,5-3.11,6.16s-5.8-.26-6.57-2.11,1.09-3.46,3.77-4.58S232.4,112.92,233.17,114.77Z" fill="#231f20"></path><path d="M217.26,134a8.37,8.37,0,0,1-3.63-.79,10.64,10.64,0,0,1-5.13-6.13.5.5,0,0,1,.33-.62.49.49,0,0,1,.62.34,9.78,9.78,0,0,0,4.61,5.51c2.21,1,4.88.91,7.94-.4,9.68-4.12,9-7.94,9-8a.5.5,0,0,1,.18-.5.49.49,0,0,1,.53,0c.05,0,4.72,2.36,11.11-.17s7-10.94,7-11a.49.49,0,0,1,.54-.45.5.5,0,0,1,.46.53c0,.37-.78,9.13-7.69,11.87a15.58,15.58,0,0,1-11.2.44c-.2,1.54-1.64,4.88-9.57,8.26A13.14,13.14,0,0,1,217.26,134Z" fill="#231f20"></path><path d="M231.13,124a.5.5,0,0,1-.46-.3l-1.07-2.56a.5.5,0,1,1,.92-.38l1.07,2.55a.49.49,0,0,1-.27.65A.41.41,0,0,1,231.13,124Z" fill="#231f20"></path><path d="M178.63,244.74a.47.47,0,0,1-.28-.09c-1-.72-6.07-4.4-6.38-6.17a.48.48,0,0,1,.4-.57.49.49,0,0,1,.58.4c.18,1,3.6,3.84,6,5.53a.49.49,0,0,1,.12.69A.49.49,0,0,1,178.63,244.74Z" fill="#231f20"></path><path d="M285.28,226s-2.71-2.29-11.26,7.3-7.92,12.3-1.87,11.26S291.12,231.17,285.28,226Z" fill="#e6e7e8"></path><ellipse cx="223.31" cy="263.92" rx="51.77" ry="5.35" fill="#e6e7e8"></ellipse><path d="M172.36,154.12a36.28,36.28,0,0,1-20.11-6,.5.5,0,0,1-.1-.7.51.51,0,0,1,.7-.1,35.53,35.53,0,0,0,28.78,4.58.5.5,0,1,1,.26,1A36.47,36.47,0,0,1,172.36,154.12Z" fill="#231f20"></path><path d="M233.45,159.44a.49.49,0,0,1-.46-.3.5.5,0,0,1,.26-.66c8.32-3.64,9.64-10.79,9.65-10.86a.5.5,0,0,1,1,.17c-.06.31-1.41,7.74-10.24,11.61A.79.79,0,0,1,233.45,159.44Z" fill="#231f20"></path></g></svg>
                                <div class="">
                                    ไม่มีสินค้าในตะกร้า
                                </div>
                            </div>
                        <?php
                        }
                        foreach ($result as $row) {

                        ?>
                            <div class="flex  max-[350px]:p-[5px] p-2 border rounded mt-2">
                                <div class="max-[350px]:mr-1 mr-2">
                                    <img class="w-[120px] rounded" src="../../assets/img/<?php echo $row["img1"]; ?>" alt="">
                                </div>
                                <div class="w-full px-1 sm:px-2 flex flex-col justify-center">
                                    <div class="flex w-full justify-between items-center">
                                        <div class="fs-5 fw-normal">
                                            <?php echo $row["name"] ?>
                                        </div>
                                        <div class="">
                                            ฿<?php echo number_format($row["cost"]) ?>
                                        </div>
                                    </div>
                                    <div class="palm-order-containertext text-gray-500 max-[400px]:max-w-[100px] max-[520px]:max-w-[150px] max-[766px]:max-w-[300px] max-[850px]:max-w-[200px] max-[1024px]:max-w-[300px] max-w-[400px] truncate mb-3">
                                        <?php echo $row["des"] ?>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center ">
                                            <ion-icon onclick="minus(<?php echo $row['product_id'] ?>)" class="cursor-pointer" name="remove-outline"></ion-icon>
                                            <!-- onkeypress="return (event.charCode !=8 && this.value.length != 2 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57)) -->
                                            <input id="<?php echo $row['product_id']; ?>" class="myinput palm-order-inputnumber mx-1 h-[25px] text-xs text-center w-[50px]" type="text" value="<?php echo $row['number'] ?>" oninput="inputNum(<?php echo $row['product_id']; ?>, this.value)" maxlength="2" >
                                            <i onclick="plus(<?php echo $row['product_id']; ?>)" class="fa-solid fa-plus font-thin cursor-pointer"></i>
                                        </div>
                                        <div onclick="deleteBt(<?php echo $row['product_id']; ?>)" class="">

                                            <svg id="delete" class="cursor-pointer" width="20" height="20" viewBox="0 0 1024 1024">
                                                <path fill="currentColor" d="m896.8 159.024l-225.277.001V71.761c0-40.528-33.008-72.496-73.536-72.496H426.003c-40.528 0-73.52 31.968-73.52 72.496v87.264h-225.28c-17.665 0-32 14.336-32 32s14.335 32 32 32h44.015l74.24 739.92c3.104 34.624 32.608 61.776 67.136 61.776h398.8c34.528 0 64-27.152 67.088-61.472l74.303-740.24h44.016c17.68 0 32-14.336 32-32s-14.32-31.985-32-31.985zM416.482 71.762c0-5.232 4.271-9.505 9.52-9.505h171.984c5.248 0 9.536 4.273 9.536 9.505v87.264h-191.04zm298.288 885.44c-.16 1.777-2.256 3.536-3.376 3.536h-398.8c-1.12 0-3.232-1.744-3.425-3.84l-73.632-733.856H788.45z" />
                                            </svg>
                                        </div>

                                    </div>
                                </div>
                            </div> <?php
                                }
                                    ?>



                    </div>
                </div>
                <div class="palm-right">
                    <div class="border-2 rounded p-4 bg-white">
                        <div class="text-center">
                            <h3 class="text-xl font-medium">สรุปคำสั่งซื้อ</h3>
                            <div class="flex justify-between ">
                                <h6 class="text-gray-500 mt-3 ">จำนวนทั้งหมด</h6>
                                <h6 class="text-gray-500 mt-3"><?php echo $countRow; $_SESSION['numOfOrder'] = $countRow; ?></h6>
                            </div>
                            <div class="flex justify-between ">
                                <h6 class="text-gray-500 mt-3 ">ยอดรวม</h6>
                                <h6 class="text-gray-500 mt-3">฿<span id="amount"><?php
                                if($countRow==0){
                                    echo 0;
                                }else{
                                    foreach ($sum as $row){
                                        echo number_format($row['0']);
                                    }
                                }
                                ?></span></h6>
                            </div>
                            <div class="flex justify-between border-b-3 border-b pb-2 ">
                                <h6 class="text-gray-500 mt-3 ">ส่วนลด</h6>
                                <h6 class="text-gray-500 mt-3">฿0</h6>
                            </div>
                            <div class="flex justify-between ">
                                <h6 class="text-gray-500 mt-3 ">ยอดรวมทั้งหมด</h6>
                                <h6 class="mt-3 palm-text-color">฿<span id="sumCost"><?php
                                if($countRow==0){
                                    echo 0;
                                }else{
                                    foreach ($sum as $row){
                                        echo number_format($row['0']);
                                    }
                                }
                                ?></span></h6>
                            </div>
                            <button onclick="confirm()" class="transition duration-300 p-2 rounded mt-4 w-full text-white bg-purple-500 hover:bg-purple-400">
                                ดำเนินการต่อ
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tippy('#delete', {
            content: 'ลบรายการนี้',
            animation: 'perspective-extreme',
            placement: 'bottom',
        });
        function confirm(){
            if(<?php echo $countRow; ?> == 0){
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: 'โปรดเลือกสินค้าอย่างน้อย 1 ชิ้น',
                    icon: 'error',
                    confirmButtonText: 'รับทราบ'
                    })
            }else{
                window.location.href = "/src/landing/address/"
            }
        }
        function deleteBt(id) {
            $.ajax({
                url: "/src/services/handleDeleteCart.php",
                type: "POST",
                data: {
                    "p_id": id
                },
                success: function() {
                    location.reload();
                }
            })
        }
        const numInputs = document.querySelectorAll('input[type=text]')
        numInputs.forEach(function(input) {
            input.addEventListener('change', function(e) {
                if (e.target.value == '' || e.target.value == 0) {
                    e.target.value = 1
                }
            })
        })
        function check(value) {
            if (value.length == 3 || event.charCode == 101 || event.charCode < 48 || event.charCode > 57 || (value.length == 0 && event.charCode == 48)) {
                return false;
            }
        }
        function inputNum(id, value){

            document.getElementById(id).value = document.getElementById(id).value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            
            num = document.getElementById(id).value;
            if(isNaN(num) || num == "" || num == 0){
                num = 1
            }
            $.ajax({
                    url: "/src/services/handleChangeNumCart.php",
                    type: "POST",
                    data: {
                        "id": id,
                        "num": num
                    },
                    success: function(data) {
                        document.getElementById("amount").innerHTML = data;
                        document.getElementById("sumCost").innerHTML = data;
                    }
                })
        }
        function minus(id) {
            if (parseInt(document.getElementById(id).value) > 1) {
                document.getElementById(id).value = parseInt(document.getElementById(id).value) - 1
                num = document.getElementById(id).value;
                $.ajax({
                    url: "/src/services/handleChangeNumCart.php",
                    type: "POST",
                    data: {
                        "id": id,
                        "num": num
                    },
                    success: function(data) {
                        document.getElementById("amount").innerHTML = data;
                        document.getElementById("sumCost").innerHTML = data;
                    }
                })
            }
        }

        function plus(id) {
            document.getElementById(id).value = parseInt(document.getElementById(id).value) + 1;
            
            num = document.getElementById(id).value;
            $.ajax({
                url: "/src/services/handleChangeNumCart.php",
                type: "POST",
                data: {
                    "id": id,
                    "num": num
                },
                success: function(data) {
                    document.getElementById("amount").innerHTML = data;
                    document.getElementById("sumCost").innerHTML = data;
                }
            })
        }
    </script>
</body>

</html>