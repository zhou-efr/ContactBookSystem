<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Book System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @layer components {
            .category-list-box {
                display: flex;
                flex-direction: row;
                align-items: center;
                gap: 1rem;
                position: relative;
                padding: 0.5rem;
                margin-right: 0.5rem;
                border-top-right-radius: 0.5rem;
                border-bottom-right-radius: 0.5rem;
            }
            .category-list-box-focus {
                background-color: rgba(196, 196, 196, 0.29);
            }
            .category-list-text {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }
        }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden font-extralight flex flex-col justify-center items-center">
    <?php
    session_start();
    if(isset($_SESSION['user_id'])){ ?>
        <div class="w-full h-full flex">
            <div class="w-1/5 h-full bg-white mb-10 shadow-md ">
                <div class="w-full h-full relative flex flex-col justify-end ">
                    <div class="w-full h-full relative flex flex-col">
                        <div class="flex items-center">
                            <a href="index.php">
                                <svg class="m-3" width="102" height="121" viewBox="0 0 102 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="10.1113" y="1.5" width="89.5683" height="118" rx="14.5" stroke="black" stroke-width="3"/>
                                    <path d="M2 27.1093H24.4809" stroke="black" stroke-width="3" stroke-linecap="round"/>
                                    <path d="M2 60.1694H24.4809" stroke="black" stroke-width="3" stroke-linecap="round"/>
                                    <path d="M2 93.8907H24.4809" stroke="black" stroke-width="3" stroke-linecap="round"/>
                                    <path d="M39.0273 121V0" stroke="black" stroke-width="3"/>
                                </svg>
                            </a>
                            <p class="text-2xl">
                                Hi,<br/>
                                <?php echo $_SESSION['username']; ?>
                            </p>
                        </div>
                        <form class="border-2 border-gray-400 rounded-lg focus:outline-none focus:border-gray-500 m-3 flex items-center justify-center" action="index.php?filter='search'" method="post">
                            <input type="text" name="search" placeholder="Search..." class="h-10 outline-none">
                            <button type="submit">
                                <svg class="h-8" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6923 0C5.69405 0 0 5.69425 0 12.6923C0 19.6903 5.69425 25.3846 12.6923 25.3846C19.6903 25.3846 25.3846 19.6903 25.3846 12.6923C25.3846 5.69425 19.6903 0 12.6923 0ZM12.6923 23.0769C6.96684 23.0769 2.30769 18.4177 2.30769 12.6923C2.30769 6.96684 6.96684 2.30769 12.6923 2.30769C18.4177 2.30769 23.0769 6.96684 23.0769 12.6923C23.0769 18.4177 18.4177 23.0769 12.6923 23.0769Z" fill="black"/>
                                    <path d="M29.6611 28.0305L23.8919 22.2613C23.4407 21.81 22.7116 21.81 22.2603 22.2613C21.8091 22.7125 21.8091 23.4416 22.2603 23.8929L28.0295 29.6621C28.2546 29.8869 28.55 30 28.8455 30C29.1409 30 29.4363 29.8869 29.6611 29.6618C30.1124 29.2109 30.1124 28.4815 29.6611 28.0305V28.0305Z" fill="black"/>
                                </svg>
                            </button>
                        </form>
                        <div class="flex flex-col gap-2 mt-4">
                            <a href="index.php" class="category-list-box <?php
                                $filter = $_GET['filter'] ?? 'all';
                                if($filter == 'all'){
                                    echo ' category-list-box-focus';
                                }
                            ?>">
                                <svg class="absolute left-0 <?php
                                $filter = $_GET['filter'] ?? 'all';
                                if($filter != 'all'){
                                    echo ' hidden';
                                }
                                ?>" width="10" height="22" viewBox="0 0 10 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-10" width="20" height="22" rx="6" fill="#9F9F9F"/>
                                </svg>
                                <svg class="ml-8" width="48" height="25" viewBox="0 0 48 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.0003 4.95288V1.17926C25.0003 0.866338 24.876 0.566464 24.6549 0.345351C24.4338 0.124238 24.1339 0 23.821 0H1.17926C0.866338 0 0.566464 0.124238 0.345351 0.345351C0.124238 0.566464 0 0.866327 0 1.17926V4.95288C0 5.2658 0.124238 5.56568 0.345351 5.78679C0.566464 6.0079 0.866327 6.13214 1.17926 6.13214H23.821C24.1339 6.13214 24.4338 6.0079 24.6549 5.78679C24.876 5.56568 25.0003 5.26581 25.0003 4.95288ZM22.6418 3.77357H2.35906V2.35846H22.6418V3.77357Z" fill="black"/>
                                    <path d="M11.3203 10.6133V14.3869C11.3203 14.6999 11.4446 14.9997 11.6657 15.2208C11.8868 15.442 12.1866 15.5662 12.4996 15.5662H35.1413C35.4542 15.5662 35.7541 15.442 35.9752 15.2208C36.1963 14.9997 36.3206 14.6999 36.3206 14.3869V10.6133C36.3206 10.3004 36.1963 10.0005 35.9752 9.7794C35.7541 9.55829 35.4543 9.43405 35.1413 9.43405H12.4996C12.1867 9.43405 11.8868 9.55829 11.6657 9.7794C11.4446 10.0005 11.3203 10.3004 11.3203 10.6133ZM13.6788 11.7926H33.9615V13.2077H13.6788V11.7926Z" fill="black"/>
                                    <path d="M46.4636 18.8679H23.8218C23.5089 18.8679 23.209 18.9921 22.9879 19.2132C22.7668 19.4343 22.6426 19.7342 22.6426 20.0471V23.8207C22.6426 24.1337 22.7668 24.4335 22.9879 24.6546C23.209 24.8758 23.5089 25 23.8218 25H46.4636C46.7765 25 47.0764 24.8758 47.2975 24.6546C47.5186 24.4335 47.6428 24.1337 47.6428 23.8207V20.0471C47.6428 19.7342 47.5186 19.4343 47.2975 19.2132C47.0764 18.9921 46.7765 18.8679 46.4636 18.8679ZM45.2843 22.6415H25.0016V21.2264H45.2843V22.6415Z" fill="black"/>
                                </svg>
                                <p class="category-list-text">All</p>
                            </a>
                            <a href="index.php?filter=family" class="category-list-box <?php
                            $filter = $_GET['filter'] ?? 'all';
                            if($filter == 'family'){
                                echo ' category-list-box-focus';
                            }
                            ?>">
                                <svg class="absolute left-0 <?php
                                $filter = $_GET['filter'] ?? 'all';
                                if($filter != 'family'){
                                    echo ' hidden';
                                }
                                ?>" width="10" height="22" viewBox="0 0 10 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-10" width="20" height="22" rx="6" fill="#9F9F9F"/>
                                </svg>
                                <svg class="ml-8" width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.04365 10.8019C6.01265 10.8019 3.54688 8.37902 3.54688 5.40096C3.54688 2.423 6.0126 0 9.04365 0C12.0741 0 14.5399 2.4229 14.5399 5.40096C14.5399 8.37912 12.074 10.8019 9.04365 10.8019ZM9.04365 1.06389C6.59917 1.06389 4.61077 3.00947 4.61077 5.40091C4.61057 7.79255 6.59917 9.73808 9.04365 9.73808C11.4875 9.73808 13.4759 7.7925 13.4759 5.40106C13.4759 3.00942 11.4875 1.06389 9.04365 1.06389V1.06389Z" fill="black"/>
                                    <path d="M1.06384 18.6171H0C0 13.7214 4.05628 9.73802 9.0426 9.73802C12.0485 9.73802 14.8505 11.1997 16.5378 13.648L15.662 14.2516C14.1731 12.0917 11.6992 10.8019 9.0426 10.8019C4.6429 10.8019 1.06389 14.3075 1.06389 18.6171L1.06384 18.6171Z" fill="black"/>
                                    <path d="M19.1483 19.6395C16.9729 19.6395 15.2031 17.8591 15.2031 15.6707C15.2031 13.4824 16.9729 11.702 19.1483 11.702C21.3232 11.702 23.0928 13.4824 23.0928 15.6708C23.0928 17.8591 21.3232 19.6395 19.1483 19.6395V19.6395ZM19.1483 12.7657C17.5592 12.7657 16.267 14.069 16.267 15.6707C16.267 17.2725 17.5592 18.5757 19.1483 18.5757C20.7367 18.5757 22.0292 17.2725 22.0292 15.6707C22.0292 14.069 20.7367 12.7657 19.1483 12.7657Z" fill="black"/>
                                    <path d="M25.5313 25H24.4674C24.4674 22.0444 22.0812 19.64 19.1484 19.64C16.2156 19.64 13.8295 22.0444 13.8295 25H12.7656C12.7656 21.4579 15.6288 18.5761 19.1485 18.5761C22.6682 18.5761 25.5313 21.458 25.5313 25H25.5313Z" fill="black"/>
                                </svg>
                                <p class="category-list-text">Family</p>
                            </a>
                            <a href="index.php?filter=friend" class="category-list-box <?php
                            $filter = $_GET['filter'] ?? 'all';
                            if($filter == 'friend'){
                                echo ' category-list-box-focus';
                            }
                            ?>">
                                <svg class="absolute left-0 <?php
                                $filter = $_GET['filter'] ?? 'all';
                                if($filter != 'friend'){
                                    echo ' hidden';
                                }
                                ?>" width="10" height="22" viewBox="0 0 10 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-10" width="20" height="22" rx="6" fill="#9F9F9F"/>
                                </svg>
                                <svg class="ml-8" width="28" height="25" viewBox="0 0 28 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.1145 8.2284C20.8084 8.2284 20.498 8.19395 20.1917 8.12485C18.6569 7.78416 17.4497 6.5727 17.109 5.04213C16.7985 3.64086 17.2126 2.2052 18.2127 1.20487C19.213 0.204548 20.6487 -0.20926 22.0499 0.101219C23.5847 0.441909 24.7919 1.64913 25.1326 3.18394C25.4431 4.58521 25.0335 6.02087 24.029 7.02543C23.2487 7.80575 22.201 8.22843 21.1145 8.22843V8.2284ZM21.1187 1.99812C20.5582 1.99812 20.0322 2.2137 19.627 2.61908C19.1054 3.1407 18.8983 3.86943 19.0623 4.61106C19.2305 5.37846 19.86 6.00366 20.6274 6.17612C21.369 6.33992 22.0975 6.13724 22.6193 5.61138C23.141 5.08976 23.3481 4.36104 23.1841 3.61941C23.0158 2.85624 22.3864 2.22681 21.619 2.05858C21.4508 2.0197 21.2826 1.99814 21.1188 1.99814L21.1187 1.99812Z" fill="black"/>
                                    <path d="M24.5803 25H17.6601C17.1083 25 16.6598 24.5515 16.6598 23.9997L16.66 16.5666H15.6468C15.095 16.5666 14.6465 16.1181 14.6465 15.5663V10.6598C14.6465 10.2329 14.9181 9.85353 15.319 9.71552C19.2727 8.35741 23.1788 8.35741 26.9345 9.71975C27.3312 9.86199 27.5941 10.2371 27.5941 10.6596V15.5705C27.5941 16.1223 27.1456 16.5708 26.5938 16.5708H25.5806V24.0039C25.5806 24.5515 25.1323 25 24.5803 25L24.5803 25ZM18.6604 22.9994H23.5842V15.5663C23.5842 15.0145 24.0327 14.566 24.5845 14.566H25.5977V11.3754C22.6961 10.4658 19.6951 10.47 16.647 11.3883V14.5702H17.6602C18.212 14.5702 18.6605 15.0187 18.6605 15.5705L18.6604 22.9994Z" fill="black"/>
                                    <path d="M6.468 8.2284C6.16196 8.2284 5.85148 8.19395 5.54524 8.12485C4.01043 7.78416 2.8032 6.5727 2.46252 5.04213C2.15205 3.64086 2.56607 2.2052 3.56617 1.20487C4.56649 0.204548 6.00221 -0.20926 7.40343 0.101219C8.93824 0.441909 10.1455 1.64913 10.4861 3.18394C10.7966 4.58521 10.387 6.02087 9.3825 7.02543C8.60218 7.80575 7.55874 8.22843 6.468 8.22843V8.2284ZM6.47224 1.99812C5.91174 1.99812 5.38568 2.2137 4.98055 2.61908C4.45893 3.1407 4.25182 3.86943 4.41581 4.61106C4.58404 5.37846 5.21347 6.00366 5.98087 6.17612C6.7225 6.33992 7.45103 6.13724 7.97284 5.61138C8.49447 5.08976 8.70157 4.36104 8.53758 3.61941C8.36935 2.85624 7.73992 2.22681 6.97252 2.05858C6.80429 2.0197 6.63626 1.99814 6.47229 1.99814L6.47224 1.99812Z" fill="black"/>
                                    <path d="M9.93396 25H3.01383C2.46201 25 2.01351 24.5515 2.01351 23.9997V16.5666H1.00032C0.448497 16.5666 0 16.1183 0 15.5663V10.6598C0 10.2329 0.271587 9.85353 0.6725 9.71552C4.62619 8.35741 8.53229 8.35741 12.288 9.71975C12.6847 9.86199 12.9476 10.2371 12.9476 10.6596V15.5705C12.9476 16.1223 12.4992 16.5708 11.9473 16.5708H10.9341V24.0039C10.9341 24.5515 10.4901 25 9.93401 25L9.93396 25ZM4.01411 22.9994H8.93792V15.5663C8.93792 15.0145 9.3864 14.566 9.93824 14.566H10.9514V11.3754C8.04979 10.4658 5.04882 10.47 2.0007 11.3883V14.5702H3.01388C3.56571 14.5702 4.0142 15.0187 4.0142 15.5705L4.01411 22.9994Z" fill="black"/>
                                </svg>
                                <p class="category-list-text">Friends</p>
                            </a>
                            <a href="index.php?filter=colleague" class="category-list-box <?php
                            $filter = $_GET['filter'] ?? 'all';
                            if($filter == 'colleague'){
                                echo ' category-list-box-focus';
                            }
                            ?>">
                                <svg class="absolute left-0 <?php
                                $filter = $_GET['filter'] ?? 'all';
                                if($filter != 'colleague'){
                                    echo ' hidden';
                                }
                                ?>" width="10" height="22" viewBox="0 0 10 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-10" width="20" height="22" rx="6" fill="#9F9F9F"/>
                                </svg>
                                <svg class="ml-8" width="33" height="25" viewBox="0 0 33 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.9098 9.76395C24.601 9.76395 26.7913 7.57361 26.7913 4.88146C26.7913 2.18931 24.601 0 21.9098 0C19.2177 0 17.0273 2.18905 17.0273 4.88146C17.0273 7.57361 19.2174 9.76395 21.9098 9.76395V9.76395ZM21.9098 0.98714C24.0571 0.98714 25.8034 2.73472 25.8034 4.88165C25.8034 7.02891 24.0571 8.77616 21.9098 8.77616C19.7616 8.77616 18.0153 7.02859 18.0153 4.88165C18.0151 2.73465 19.7613 0.98714 21.9098 0.98714Z" fill="black"/>
                                    <path d="M31.5368 22.0931H30.9361C31.5652 20.8601 30.9759 18.6936 30.339 16.3953C30.2391 16.04 30.1413 15.6856 30.0506 15.344C29.2149 12.1771 26.5975 10.9702 25.512 10.5989C25.2826 10.5193 25.0305 10.6181 24.9169 10.8328L23.4238 13.6157L23.1785 12.846C23.5837 12.5974 23.8519 12.1523 23.8519 11.6538C23.8519 10.8818 23.2228 10.2537 22.4518 10.2537H21.3765C20.6045 10.2537 19.9764 10.8828 19.9764 11.6538C19.9764 12.1511 20.2433 12.5974 20.6485 12.846L20.4022 13.6157L18.9101 10.8328C18.7943 10.6194 18.5434 10.5173 18.3163 10.5989C17.2297 10.9702 14.6136 12.1771 13.7754 15.344C13.6847 15.6879 13.5859 16.0423 13.487 16.3999C12.8488 18.6959 12.2618 20.8598 12.8919 22.0931H12.2889C11.7747 22.0931 11.3555 22.5121 11.3555 23.0266V24.0678C11.3555 24.5821 11.7744 25 12.2889 25H31.5406C32.0538 25 32.4718 24.5821 32.4718 24.0678V23.0266C32.468 22.5121 32.05 22.0931 31.5368 22.0931H31.5368ZM14.4341 16.6658C14.5352 16.3036 14.6338 15.9459 14.7258 15.5985C15.3559 13.2186 17.1749 12.1285 18.2412 11.6844L20.0785 15.1137C20.1728 15.2886 20.3669 15.3861 20.56 15.3737C20.7577 15.3545 20.9245 15.2204 20.9848 15.0321L21.7285 12.7033C21.7738 12.5637 21.7535 12.4126 21.675 12.2877C21.5967 12.165 21.4661 12.0821 21.3207 12.0629C21.1151 12.0378 20.9608 11.8631 20.9608 11.6586C20.9608 11.4315 21.1458 11.2475 21.3729 11.2475H22.4483C22.6753 11.2475 22.8604 11.4315 22.8604 11.6586C22.8604 11.8641 22.7047 12.0367 22.4992 12.0629C22.354 12.0834 22.2245 12.165 22.1449 12.2877C22.0653 12.4103 22.0473 12.5637 22.0914 12.7021L22.8328 15.0298C22.8928 15.2193 23.0599 15.3544 23.2575 15.3737C23.4608 15.3874 23.6448 15.2895 23.7378 15.1137L25.5784 11.6844C26.6434 12.1295 28.4637 13.2196 29.0927 15.5985C29.1848 15.9447 29.2836 16.3002 29.3835 16.6612C29.9104 18.5598 30.5656 20.9215 30.0204 21.7401C29.9512 21.8445 29.8217 21.9864 29.498 22.0262C29.1597 22.067 28.853 22.083 28.5603 22.0886C28.5341 22.0886 28.5068 22.0909 28.4807 22.0954H27.9991L27.9996 16.702C27.9996 16.1877 27.5807 15.7708 27.0652 15.7708H16.7538C16.2406 15.7708 15.8226 16.1874 15.8226 16.702V22.0932H15.3391C15.314 22.0886 15.2868 22.0863 15.2595 22.0863C14.9665 22.0807 14.6611 22.0648 14.3217 22.024C13.9993 21.9842 13.8698 21.8422 13.8006 21.7378C13.2542 20.9225 13.9083 18.5631 14.434 16.6657L14.4341 16.6658ZM27.0118 16.702V22.0932H16.8063L16.754 16.7575L27.0118 16.702ZM31.4799 24.0144H12.3379V23.0277H31.4786V24.0144H31.4799Z" fill="black"/>
                                    <path d="M17.993 21.445H25.8245C26.0982 21.445 26.3195 21.2247 26.3195 20.951C26.3195 20.6773 26.0992 20.456 25.8245 20.456H17.993C17.7206 20.456 17.498 20.6762 17.498 20.951C17.498 21.2247 17.7206 21.445 17.993 21.445Z" fill="black"/>
                                    <path d="M9.1359 9.44278C11.4874 9.44278 13.4017 7.52846 13.4017 5.17694C13.4017 2.8264 11.4874 0.91214 9.1359 0.91214C6.78536 0.91214 4.87109 2.82647 4.87109 5.17694C4.87109 7.52846 6.78542 9.44278 9.1359 9.44278ZM9.1359 1.90136C10.9435 1.90136 12.414 3.36961 12.414 5.1772C12.414 6.9848 10.9435 8.45532 9.1359 8.45532C7.32928 8.45532 5.85901 6.9848 5.85901 5.1772C5.85876 3.36961 7.32928 1.90136 9.1359 1.90136V1.90136Z" fill="black"/>
                                    <path d="M11.2175 21.445C11.3526 21.3542 11.4923 21.2691 11.6489 21.2146C11.6274 20.9715 11.6297 20.7173 11.6411 20.4573L4.82244 20.457V16.0105H12.565C12.6524 15.6914 12.7376 15.3849 12.8159 15.0942C12.8228 15.0681 12.8342 15.0476 12.841 15.0228H4.70655C4.22626 15.0228 3.83445 15.4146 3.83445 15.8949V20.4583H3.50293C3.47683 20.4524 3.44844 20.4491 3.42132 20.4491C3.16914 20.4458 2.90935 20.4299 2.62319 20.3979C2.37683 20.3673 2.28026 20.2662 2.22349 20.1833C1.77387 19.5065 2.33146 17.4944 2.77982 15.8777C2.86599 15.5687 2.95115 15.261 3.03074 14.9637C3.7926 12.083 6.5608 11.4415 6.67895 11.4164L6.67439 11.3971C6.72432 11.3948 6.76969 11.3893 6.80846 11.3801C6.81987 11.3768 7.94166 11.1325 9.13616 11.1325C10.3046 11.1325 11.4048 11.3675 11.4162 11.3675L11.5934 11.4164C11.6127 11.4209 12.8435 11.7025 13.9064 12.7098C14.0995 12.4282 14.3048 12.1671 14.5195 11.9309C13.2637 10.7726 11.8228 10.415 11.6775 10.415H11.6752C11.6253 10.4049 10.4399 10.1436 9.13639 10.1436C7.83061 10.1436 6.64518 10.4046 6.59529 10.415C6.58515 10.416 6.5261 10.4343 6.48073 10.4467C6.47744 10.449 6.47389 10.449 6.47161 10.449C6.32967 10.4797 2.99475 11.2314 2.07626 14.7093C1.99896 15.0022 1.9138 15.3054 1.82864 15.612C1.29385 17.539 0.798867 19.358 1.27231 20.456H0.869831C0.390555 20.456 0 20.8466 0 21.3258V22.2205C0 22.7031 0.390568 23.0937 0.869831 23.0937H10.3623V23.0267C10.3623 22.6884 10.469 22.3817 10.6224 22.106L0.987776 22.1057V21.4437H11.2173L11.2175 21.445Z" fill="black"/>
                                    <path d="M5.28125 19.5315C5.28125 19.804 5.5015 20.0255 5.77624 20.0255H11.6683C11.6989 19.7064 11.7511 19.3749 11.8135 19.0375H5.77529C5.50182 19.0375 5.28131 19.2591 5.28131 19.5315L5.28125 19.5315Z" fill="black"/>
                                </svg>
                                <p class="category-list-text">Colleague</p>
                            </a>
                            <a href="index.php?filter=other" class="category-list-box <?php
                            $filter = $_GET['filter'] ?? 'all';
                            if($filter == 'other'){
                                echo ' category-list-box-focus';
                            }
                            ?>">
                                <svg class="absolute left-0 <?php
                                $filter = $_GET['filter'] ?? 'all';
                                echo $filter;
                                if($filter != 'other'){
                                    echo ' hidden';
                                }
                                ?>" width="10" height="22" viewBox="0 0 10 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-10" width="20" height="22" rx="6" fill="#9F9F9F"/>
                                </svg>
                                <svg class="ml-8" width="45" height="14" viewBox="0 0 45 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.4993 0C18.8046 0 15.8203 2.98429 15.8203 6.67901C15.8203 10.3737 18.8046 13.358 22.4993 13.358C26.194 13.358 29.1783 10.3737 29.1783 6.67901C29.1783 2.98429 26.194 0 22.4993 0ZM22.4993 10.421C20.4627 10.421 18.8046 8.76296 18.8046 6.67909C18.8046 4.59481 20.4627 2.93717 22.4993 2.93717C24.536 2.93717 26.194 4.59523 26.194 6.67909C26.194 8.76338 24.536 10.421 22.4993 10.421Z" fill="black"/>
                                    <path d="M6.67901 0C2.98428 0 0 2.98429 0 6.67901C0 10.3737 2.98428 13.358 6.67901 13.358C10.3737 13.358 13.358 10.3737 13.358 6.67901C13.358 2.98429 10.3737 0 6.67901 0V0ZM6.67901 10.421C4.64234 10.421 2.98428 8.76296 2.98428 6.67909C2.98428 4.59481 4.64234 2.93717 6.67901 2.93717C8.71567 2.93717 10.3737 4.59523 10.3737 6.67909C10.3737 8.76338 8.71567 10.421 6.67901 10.421Z" fill="black"/>
                                    <path d="M38.3216 0C34.6269 0 31.6426 2.98429 31.6426 6.67901C31.6426 10.3737 34.6269 13.358 38.3216 13.358C42.0163 13.358 45.0006 10.3737 45.0006 6.67901C45.0006 2.98429 42.0163 0 38.3216 0V0ZM38.3216 10.421C36.2849 10.421 34.5797 8.76296 34.5797 6.67909C34.5797 4.59481 36.2377 2.93717 38.3216 2.93717C40.3582 2.93717 42.0163 4.59523 42.0163 6.67909C42.0163 8.76338 40.3586 10.421 38.3216 10.421Z" fill="black"/>
                                </svg>
                                <p class="category-list-text">Other</p>
                            </a>
                        </div>
                    </div>
                    <a href="user/logout.php" class="block bg-gray-300 py-2 w-11/12 rounded-lg mb-3 hover:bg-gray-200 self-center">
                        <p class="text-center text-2xl w-full">Logout</p>
                    </a>
                    <a href="index.php" class="w-full pb-5 flex justify-center items-center h-20">
                        <svg class="h-16" width="67" height="68" viewBox="0 0 67 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7796 0.249681C28.6413 0.0106627 28.3354 -0.0709905 28.0964 0.067303C27.8574 0.205597 27.7757 0.511468 27.914 0.750486L32.767 9.138L0.20467 65.2852C-0.375274 66.2852 0.346249 67.5377 1.50225 67.5377H20.854C20.8601 67.5378 20.8662 67.5378 20.8722 67.5377H45.9193C45.9253 67.5378 45.9314 67.5378 45.9374 67.5377H65.111C66.2663 67.5377 66.9879 66.2865 66.4093 65.2865L33.9226 9.13859L38.787 0.750925C38.9256 0.512047 38.8442 0.206093 38.6053 0.0675573C38.3665 -0.0709787 38.0605 0.0103642 37.922 0.249242L33.3453 8.14078L28.7796 0.249681ZM1.06972 65.7868L33.3443 10.1358L65.5437 65.7873C65.7366 66.1206 65.4961 66.5377 65.111 66.5377H46.2161L34.6434 46.559C34.0643 45.5593 32.6199 45.562 32.0446 46.5638L20.5741 66.5377H1.50225C1.11691 66.5377 0.876407 66.1202 1.06972 65.7868ZM33.778 47.0602L45.0604 66.5377H21.7273L32.9118 47.0618C33.1036 46.7279 33.585 46.727 33.778 47.0602ZM31.1711 31.1323V30.3585H31.3199H32.1711H32.4539H33.3697H33.4539V30.2495V30.1323V29.9916V29.3585V29.2495H34.3697V29.3585V29.9916V30.1323V30.2495V30.3585H34.4539H35.3697H35.7944H36.7875H36.7944V31.1323H36.7875H35.7944H35.3697H34.4539H34.3697V31.3585V31.3702V32.1323V32.1698V32.3702H34.4539H35.3697H36.1168H36.7875H37.1168V33.1698H36.7875H36.1168H34.4539H34.3697H33.4539H33.3697H31.8487H31.3057H30.8487V32.3702H31.3196H31.8487H32.4539H33.3697H33.4539V32.1698V32.1323V31.3702V31.3585V31.1323H33.3697H32.4539H32.1711H31.3199H31.1711ZM30.3199 31.3702V32.1323V32.2284C30.3199 32.2753 30.3198 32.3226 30.3196 32.3702C30.3184 32.6264 30.3141 32.8939 30.3048 33.1698C30.2939 33.4933 30.2762 33.8283 30.2489 34.1698C30.1345 35.601 29.8515 37.1472 29.1944 38.4479C29.0457 38.7424 28.8778 39.0242 28.6883 39.2894L28.6561 39.3339C28.6026 39.2671 28.5214 39.1848 28.4289 39.1015C28.2539 38.9438 28.0386 38.7825 27.8951 38.7149C28.0919 38.4432 28.2629 38.1554 28.4113 37.8559C29.2841 36.0941 29.3783 33.9257 29.3783 32.2284V29.0889V28.9916V28.0889H30.3199H30.3783H37.7419H37.7875H38.7419V28.9916V29.0889V38.0315C38.7419 38.6505 38.5742 38.9084 38.1744 39.076C38.0082 39.1403 37.793 39.1802 37.5159 39.2047L37.4651 39.209C37.0819 39.2396 36.5852 39.2437 35.9432 39.2437C35.9165 39.0661 35.8348 38.8212 35.7444 38.6059C35.7035 38.5086 35.6609 38.4173 35.6207 38.341C35.7291 38.3444 35.837 38.3471 35.9432 38.3492C36.1219 38.3528 36.2959 38.3548 36.4591 38.3555C36.5503 38.3559 36.6382 38.356 36.7217 38.3557C37.0697 38.3545 37.3408 38.348 37.4591 38.3413L37.4651 38.341C37.6448 38.341 37.7343 38.2994 37.7693 38.1856C37.7722 38.176 37.7748 38.1659 37.777 38.1553C37.7842 38.12 37.7875 38.079 37.7875 38.0315V34.1698V33.1698V32.3702V32.1323V31.3702V31.1323V30.3585V29.9916V29.3585V29.0889V28.9916H37.7419H36.7875H35.3697H34.3697H33.4539H32.4539H31.3199H30.3783H30.3199V29.0889V29.3585V29.9916V30.3585V31.1323V31.3702ZM35.4591 37.6059H34.1037H33.3577H32.4806H32.3577V37.8451V38.3281H31.4806V37.8451V37.6059V37.3281V36.8451V36.6059V35.253V35.0139V34.253H32.3577H32.4806H35.4591H35.5562H36.4591V35.0139V35.253V36.6059V36.8451V37.3555V37.6059H35.6437H35.5562H35.4591ZM33.3577 36.8451H32.4806H32.3577V36.6059V36.0139V35.8451V35.253V35.0139H32.4806H33.3577H34.5562H35.4591H35.5562V35.253V35.8451V36.0139V36.6059V36.8451H35.4591H34.5562H33.3577Z" fill="black"/>
                        </svg>
                        <p class="text-2xl">
                            La tribu des zhou
                        </p>
                    </a>
                </div>
            </div>
            <div class="w-4/5 h-full mx-4 flex flex-col justify-between">
                <table class="table-auto w-full h-max-full overflow-y-scroll">
                    <thead>
                    <tr class="border-b-2">
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 font-extralight text-left">Email</th>
                        <th class="px-4 py-2 font-extralight text-left">Phone</th>
                        <th class="px-4 py-2 font-extralight text-left">Address</th>
                        <th class="px-4 py-2 font-extralight text-left">Gender</th>
                        <th class="px-4 py-2 font-extralight text-left">Relation</th>
                        <th class="px-4 py-2 font-extralight text-left">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include "sources/conn.php";
                    $filter = $_GET['filter'] ?? 'all';

                    switch ($filter) {
                        case 'search':
                            $search_key = $_POST['search'] ?? '';
                            $sql = "SELECT * FROM contacts WHERE username LIKE '%$search_key%' OR email LIKE '%$search_key%' OR phone LIKE '%$search_key%' OR address LIKE '%$search_key%'";
                            break;
                        case 'family':
                            $sql = "SELECT * FROM contacts WHERE relationship = 'family'";
                            break;
                        case 'friend':
                            $sql = "SELECT * FROM contacts WHERE relationship = 'friend'";
                            break;
                        case 'colleague':
                            $sql = "SELECT * FROM contacts WHERE relationship = 'colleague'";
                            break;
                        case 'other':
                            $sql = "SELECT * FROM contacts WHERE relationship = 'other'";
                            break;
                        default:
                            $sql = "SELECT * FROM contacts";
                    }
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2'>" . $row['username'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row['email'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row['phoneNumber'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row['address'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row['gender'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row['relationship'] . "</td>";
                            echo "<td class='px-4 py-2'><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='./sources/delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <form class="mb-5" method="post" action="sources/add.php">
                    <div class="flex flex-col gap-4 justify-end">
                        <div class="flex gap-4 items-end">
                            <div class="w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="name" type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="email" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phoneNumber">
                                    Phone Number
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="phoneNumber" type="text" name="phoneNumber" placeholder="Phone Number">
                            </div>
                            <div class="w-1/4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Address
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="address" type="text" name="address" placeholder="Address">
                        </div>
                        </div>
                        <div class="flex gap-4 items-end">
                            <div class="w-1/4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="relationship">
                                    Relationship
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="relationship" id="relationship">
                                    <option selected value="please select">Please select</option>
                                    <option value="family">Family</option>
                                    <option value="friend">Friend</option>
                                    <option value="colleague">Colleague</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="w-1/4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="birthday">
                                    Birthday
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthday" type="date" name="birthday" placeholder="Birthday">
                            </div>
                            <div class="w-1/4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                    Gender
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="gender" id="gender">
                                    <option selected value="please select">Please select</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="w-1/4">
                                <input type="submit" class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                       value="Add">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php }else{ ?>
        <div class="flex flex-col justify-center items-center w-1/3">
            <svg class="h-52 mb-10" width="245" height="292" viewBox="0 0 245 292" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="26" y="5" width="214" height="282" rx="11" stroke="black" stroke-width="10"/>
                <path d="M5 66H59" stroke="black" stroke-width="10" stroke-linecap="round"/>
                <path d="M5 146H59" stroke="black" stroke-width="10" stroke-linecap="round"/>
                <path d="M5 226H59" stroke="black" stroke-width="10" stroke-linecap="round"/>
                <path d="M95 292V0" stroke="black" stroke-width="10"/>
            </svg>
            <div class="flex flex-col w-full">
                <a href="login.php" class="block bg-gray-300 w-full py-2 rounded-lg mb-3 hover:bg-gray-200">
                    <p class="text-center text-2xl w-full">Login</p>
                </a>
                <a href="register.php" class="text-center text-lg w-full hover:text-gray-500">Register</a>
            </div>
        </div>
        <footer class="absolute bottom-5 w-full flex justify-center items-center h-20">
        <svg class="h-14" width="67" height="68" viewBox="0 0 67 68" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7796 0.249681C28.6413 0.0106627 28.3354 -0.0709905 28.0964 0.067303C27.8574 0.205597 27.7757 0.511468 27.914 0.750486L32.767 9.138L0.20467 65.2852C-0.375274 66.2852 0.346249 67.5377 1.50225 67.5377H20.854C20.8601 67.5378 20.8662 67.5378 20.8722 67.5377H45.9193C45.9253 67.5378 45.9314 67.5378 45.9374 67.5377H65.111C66.2663 67.5377 66.9879 66.2865 66.4093 65.2865L33.9226 9.13859L38.787 0.750925C38.9256 0.512047 38.8442 0.206093 38.6053 0.0675573C38.3665 -0.0709787 38.0605 0.0103642 37.922 0.249242L33.3453 8.14078L28.7796 0.249681ZM1.06972 65.7868L33.3443 10.1358L65.5437 65.7873C65.7366 66.1206 65.4961 66.5377 65.111 66.5377H46.2161L34.6434 46.559C34.0643 45.5593 32.6199 45.562 32.0446 46.5638L20.5741 66.5377H1.50225C1.11691 66.5377 0.876407 66.1202 1.06972 65.7868ZM33.778 47.0602L45.0604 66.5377H21.7273L32.9118 47.0618C33.1036 46.7279 33.585 46.727 33.778 47.0602ZM31.1711 31.1323V30.3585H31.3199H32.1711H32.4539H33.3697H33.4539V30.2495V30.1323V29.9916V29.3585V29.2495H34.3697V29.3585V29.9916V30.1323V30.2495V30.3585H34.4539H35.3697H35.7944H36.7875H36.7944V31.1323H36.7875H35.7944H35.3697H34.4539H34.3697V31.3585V31.3702V32.1323V32.1698V32.3702H34.4539H35.3697H36.1168H36.7875H37.1168V33.1698H36.7875H36.1168H34.4539H34.3697H33.4539H33.3697H31.8487H31.3057H30.8487V32.3702H31.3196H31.8487H32.4539H33.3697H33.4539V32.1698V32.1323V31.3702V31.3585V31.1323H33.3697H32.4539H32.1711H31.3199H31.1711ZM30.3199 31.3702V32.1323V32.2284C30.3199 32.2753 30.3198 32.3226 30.3196 32.3702C30.3184 32.6264 30.3141 32.8939 30.3048 33.1698C30.2939 33.4933 30.2762 33.8283 30.2489 34.1698C30.1345 35.601 29.8515 37.1472 29.1944 38.4479C29.0457 38.7424 28.8778 39.0242 28.6883 39.2894L28.6561 39.3339C28.6026 39.2671 28.5214 39.1848 28.4289 39.1015C28.2539 38.9438 28.0386 38.7825 27.8951 38.7149C28.0919 38.4432 28.2629 38.1554 28.4113 37.8559C29.2841 36.0941 29.3783 33.9257 29.3783 32.2284V29.0889V28.9916V28.0889H30.3199H30.3783H37.7419H37.7875H38.7419V28.9916V29.0889V38.0315C38.7419 38.6505 38.5742 38.9084 38.1744 39.076C38.0082 39.1403 37.793 39.1802 37.5159 39.2047L37.4651 39.209C37.0819 39.2396 36.5852 39.2437 35.9432 39.2437C35.9165 39.0661 35.8348 38.8212 35.7444 38.6059C35.7035 38.5086 35.6609 38.4173 35.6207 38.341C35.7291 38.3444 35.837 38.3471 35.9432 38.3492C36.1219 38.3528 36.2959 38.3548 36.4591 38.3555C36.5503 38.3559 36.6382 38.356 36.7217 38.3557C37.0697 38.3545 37.3408 38.348 37.4591 38.3413L37.4651 38.341C37.6448 38.341 37.7343 38.2994 37.7693 38.1856C37.7722 38.176 37.7748 38.1659 37.777 38.1553C37.7842 38.12 37.7875 38.079 37.7875 38.0315V34.1698V33.1698V32.3702V32.1323V31.3702V31.1323V30.3585V29.9916V29.3585V29.0889V28.9916H37.7419H36.7875H35.3697H34.3697H33.4539H32.4539H31.3199H30.3783H30.3199V29.0889V29.3585V29.9916V30.3585V31.1323V31.3702ZM35.4591 37.6059H34.1037H33.3577H32.4806H32.3577V37.8451V38.3281H31.4806V37.8451V37.6059V37.3281V36.8451V36.6059V35.253V35.0139V34.253H32.3577H32.4806H35.4591H35.5562H36.4591V35.0139V35.253V36.6059V36.8451V37.3555V37.6059H35.6437H35.5562H35.4591ZM33.3577 36.8451H32.4806H32.3577V36.6059V36.0139V35.8451V35.253V35.0139H32.4806H33.3577H34.5562H35.4591H35.5562V35.253V35.8451V36.0139V36.6059V36.8451H35.4591H34.5562H33.3577Z" fill="black"/>
        </svg>
        <p class="text-lg">
            Un projet de la tribu des zhou
        </p>
    </footer>
    <?php } ?>
</body>
</html>