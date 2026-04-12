<?php
$site_title = 'MovieStore';
$homepage_title = 'MovieStore - Movies and TV Shows Affiliate Script';
$homepage_desc = 'Welcome to the best Movies and TV Shows Affiliate Script.';
$site_keywords = 'MovieStore, movies, tv shows, itunes affiliate script, php movies script, php movies affiliate script, movie script';
$git = 'https://cdn.jsdelivr.net/gh/FAQ9/NSRP/';
$assets = [
    'contact' => 'contact.png',
    'logo' => 'logo.png',
    'stop' => 'stop.png',
    'img_cmt' => 'thumb-avatar.webp',
    'favicon' => 'favicon.ico',
    'styles' => 'styles.css',
];
$img_cmt = "{$git}{$assets['img_cmt']}";
$head = <<<HTML
<link href="{$git}{$assets['favicon']}" rel="shortcut icon" type="image/x-icon">
<link href="/hhh.css" rel="stylesheet">

</head>
<body class="scroll-bar">
<div id="ah_wrapper">
    <div id="navbar">
        <div class="flex flex-hozi-center padding-10">
            <div class="logo">
                <a href="/" title="STORE" rel="home">
                    <img src="{$git}{$assets['logo']}">
                </a>
            </div>
            <div class="nav-items flex-wrap flex">
               <form class="flex" id="searchForm" action="javascript:void(0);" method="GET">
    <input type="text" placeholder="Enter keywords..." value="" class="padding-10 bg-cod-gray color-gray" name="id" id="searchInput">
    <button type="submit" class="flex flex-hozi-center bg-white color-black btn">
        <span>Search</span>
    </button>
</form>
            </div>
        </div>
    </div>
HTML;




error_reporting(E_ALL & ~E_NOTICE);
ini_set('max_execution_time', 999999);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$nonce = base64_encode(random_bytes(16));
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'nonce-$nonce'; style-src 'self' cdn.jsdelivr.net; img-src 'self' cdn.jsdelivr.net; connect-src 'self'; frame-src 'self' short.ink abysscdn.com vidoza.net videzz.net doodstream.com d000d.com streamtape.com; object-src 'none'; font-src 'self'; media-src 'self';");
$script = <<<HTML
    <script nonce="$nonce">

function debounce(func, delay) {
    let timer;
    return function(...args) {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
}

function initLazyLoad() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    if (scrollToTopBtn) {
        const handleScroll = debounce(function() {
           if (window.scrollY > 500) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        }, 100);
        window.addEventListener('scroll', handleScroll);

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const lazyImages = document.querySelectorAll('#lazyimg img[data-src]');
    const scrollContainer = document.querySelector('.scroll-container') || window;
    const lazyLoadDebounced = debounce(lazyLoad, 100);

    if (scrollContainer) {
        scrollContainer.addEventListener('scroll', lazyLoadDebounced);
    }

    function lazyLoad() {
        lazyImages.forEach(img => {
            const rect = img.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0 && !img.getAttribute('data-loaded') && img.getAttribute('data-src')) {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                img.setAttribute('data-loaded', true);
                img.style.opacity = '0';
                img.addEventListener('load', function() {
                    img.style.opacity = '1';
                });
            }
        });
    }
}

function PopAD() {
    const button = document.getElementById("closeButton");
    const element = document.getElementById("catfish");

    function getCookie(name) {
        const match = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
        return match ? decodeURIComponent(match[1]) : null;
    }

    function setCookie(name, value, expiresHours, path, domain, secure) {
        const expires = new Date(Date.now() + expiresHours * 60 * 60 * 1000);
        const expiresString = expires.toUTCString();

        let cookieString = name + "=" + encodeURIComponent(value);
        cookieString += ";expires=" + expiresString;

        if (path) {
            cookieString += ";path=" + path;
        }
        if (domain) {
            cookieString += ";domain=" + domain;
        }
        if (secure) {
            cookieString += ";secure";
        }

        document.cookie = cookieString;
    }

    function popUnder() {
        if (!getCookie('cucre')) {
            const urls = [
                "https://google.com/",
                "https://google.com/",
                "https://google.com/"
            ];
            setCookie('cucre', 'cucre Popunder', 2, '/', '', '');
            const url = urls[Math.floor(Math.random() * urls.length)];
            const pop = window.open(url, 'windowcucre');
            if (pop) {
                pop.blur();
                window.focus();
            }
        }
    }

    if (button && element) {
        button.addEventListener("click", function() {
            element.style.display = "none";
        });

        document.body.addEventListener("click", popUnder);
    } else {
        console.error('Button or element not found');
    }
}

function initSearchForm() {
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");

    if (searchForm && searchInput) {
        searchForm.addEventListener("submit", function(event) {
            event.preventDefault();
            let keyword = searchInput.value.trim();

            if (keyword) {
                keyword = filterSpecialCharacters(keyword);
                keyword = keyword.replace(/\s+/g, '-');
                const url = "/" + encodeURIComponent(keyword) + "-page/1";
                window.location.href = url;
            }
        });
    }

    function filterSpecialCharacters(input) {
        const regex = /[^a-zA-Z0-9\sàáạãảăắằẵặẳâấầẫậẩèéẹẽẻêềếểễệìíịĩỉòóọõỏôồốỗộổơờớỡợởùúụũủưừứựữửỳýỵỹỷđ\s]/g;
        return input.replace(regex, '');
    }
}

function initComments() {
    let currentPage = 1;
    const csrfTokenInput = document.getElementById('csrf_token');
    const cmtIdInput = document.getElementById('cmt_id');
    const loadMoreButton = document.getElementById('load-more');
    const commentForm = document.getElementById('comment-form');
    const commentsContainer = document.getElementById('comments-container');
    const loadingIndicator = document.getElementById('loading-indicator');

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', () => loadComments(currentPage));
    }

    if (commentForm) {
        commentForm.addEventListener('submit', e => {
            e.preventDefault();
            submitComment();
        });
    }

    loadComments(currentPage);

    async function updateCsrfToken() {
        if (!csrfTokenInput) {
            return;
        }
        try {
            const response = await fetch('/token');
            if (!response.ok) {
                throw new Error('Failed to fetch CSRF token');
            }
            const data = await response.json();
            csrfTokenInput.value = data.csrf_token;
        } catch (error) {
            console.error('Error fetching CSRF token:', error);
        }
    }

    async function loadComments(page) {
        if (cmtIdInput) {
            showLoading();
            try {
                await updateCsrfToken();
                const response = await fetch('/', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ page_cmt: page, csrf_token: csrfTokenInput.value, cmt_id: cmtIdInput.value })
                });
                if (!response.ok) {
                    throw new Error('Failed to load comments');
                }
                const newCommentsHtml = await response.text();
                hideLoading();
                if (newCommentsHtml.trim()) {
                    commentsContainer.insertAdjacentHTML('beforeend', newCommentsHtml.trim());

                    const commentCount = parseInt(document.getElementById('tong').innerText.trim());
                    document.getElementById('tcmt').innerText = commentCount;

                    const totalPages = Math.ceil(commentCount / 5);
                    if (currentPage < totalPages) {
                        loadMoreButton.style.display = 'none';
                        setTimeout(() => {
                            loadMoreButton.style.display = 'block';
                        }, 1000);
                        currentPage++;

                        loadMoreButton.addEventListener('click', function() {
                            const lastComment = commentsContainer.lastElementChild;
                            lastComment.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        });
                    } else {
                        loadMoreButton.style.display = 'none';
                    }
                }
            } catch (error) {
                console.error('Error loading comments:', error);
            }
        }
    }

    async function submitComment() {
        try {
            await updateCsrfToken();
            const form = new FormData(document.getElementById('comment-form'));
            const response = await fetch('/', { method: 'POST', body: form });
            if (!response.ok) {
                throw new Error('Failed to submit comment');
            }
            const newCommentHtml = await response.text();
            if (newCommentHtml.trim()) {
                commentsContainer.insertAdjacentHTML('afterbegin', newCommentHtml.trim());

                const commentCount = parseInt(document.getElementById('tong').innerText.trim());
                document.getElementById('tcmt').innerText = commentCount;
                document.getElementById('comment-form').reset();
            }
        } catch (error) {
            console.error('Error submitting comment:', error);
        }
    }

    function showLoading() {
        if (loadingIndicator) {
            loadingIndicator.style.display = 'flex';
        }
        loadMoreButton.style.display = 'none';
    }

    function hideLoading() {
        if (loadingIndicator) {
            loadingIndicator.style.display = 'none';
        }
    }
}

function initVideoPlayer() {
    const servers = ['server1', 'server2', 'server3', 'server4'];
    const videoIframe = document.getElementById('video-player');

    if (videoIframe) {
        play(1);
    }

    servers.forEach(addClickEvent);

    function addClickEvent(serverId) {
        const serverElement = document.getElementById(serverId);
        if (serverElement) {
            serverElement.addEventListener('click', function() {
                if (!this.classList.contains('default-srv')) {
                    removeDefaultSrv();
                    enableAllServers();
                    this.classList.add('default-srv');
                    this.style.pointerEvents = 'none';
                    play(serverId.replace('server', ''));
                }
            });
        }
    }

    function removeDefaultSrv() {
        const defaultElements = document.querySelectorAll('span.default-srv');
        defaultElements.forEach(element => element.classList.remove('default-srv'));
    }

    function enableAllServers() {
        servers.forEach(serverId => {
            const serverElement = document.getElementById(serverId);
            if (serverElement) {
                serverElement.style.pointerEvents = 'auto';
            }
        });
    }

    async function play(sv) {
        const dataid = videoIframe.dataset.id;
        try {
            const response = await fetch('/', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ sv: sv, video_id: dataid })
            });
            if (!response.ok) {
                throw new Error('Failed to play video');
            }
            const src = await response.text();
            videoIframe.src = src;
        } catch (error) {
            console.error('Error playing video:', error);
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    PopAD();
    initSearchForm();
    initLazyLoad();
    const videoPlayerElement = document.getElementById('video-player');
    if (videoPlayerElement) {
        initComments();
        initVideoPlayer();
    }
});
</script>




HTML;




function filelist($content, $filter = null, $keyword = null)
{
    $output = ''; // Biến để lưu trữ toàn bộ nội dung HTML
    $i = 0;
    $max = 10;
$isContentArray = is_array($content);
if ($isContentArray) {
    // Lọc bài viết theo từ khóa tìm kiếm
    if (isset($keyword)) {
        $content = array_filter($content, function($file) use ($keyword) {
            // Chuyển đổi từ khóa và nội dung bài viết về chữ thường để so sánh không phân biệt hoa thường
            $keyword = strtolower($keyword);
            $fileContent = strtolower($file[10]);

            // Kiểm tra xem mỗi chữ cái trong từ khóa có xuất hiện trong nội dung bài viết không
            foreach (str_split($keyword) as $char) {
                if (stripos($fileContent, $char) === false) {
                    return false; // Nếu không tìm thấy chữ cái, bỏ qua bài viết này
                }
            }
            return true;
        });
        $kw = $keyword . '-';
    }
}
$tong = $isContentArray ? count($content) : 0;
    if ($filter == 'random') {
        foreach (array_rand($content, 10) as $file) {
            if ($i == $max) {
                break;
            }
            $file = $content[$file];
            $img = '/data/thumb/' . $file[8];
            $title = $file[9];
            $output .= '<div id="lazyimg" class="movie-item"><a href="/' . $file[10] . '.html" title="' . $title . '"><div><img loading="lazy" data-src="' . $img . '" src="https://cdn.jsdelivr.net/gh/FAQ9/NSRP/loading.svg" alt="' . $title . '" /></div><div class="name-movie">' . $title . '</div></a></div>';
            $i++;
        }
} elseif ($filter == 'top') { 
$data = json_decode(file_get_contents('data/cmt.json'), true);
$ids = array_keys($data);
usort($data, fn($a, $b) => $b['views'] - $a['views']);
$top_posts = array_slice($data, 0, $max); 
echo '<div class="movies-list">';
foreach ($top_posts as $post_id => $post) {
            $file = $content[$ids[$post_id]];
            echo $file;
}
echo '</div>';   
} else {
        if ($tong <= 0) {
            $output .= '<div class="noti-error">Không tìm thấy bộ phim nào khớp với từ khoá của bạn!</div></div>';
        } else {
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = htmlspecialchars(strip_tags(max(1, filter_var($_GET['page'] ?? 1, FILTER_VALIDATE_INT))));
            }
            if (!preg_match('/[0-9]/', $page, $matches)) {
                $page = 1;
            }
            if ($page <= 0) {
                $page = 1;
            }
            $per = 10;
            $npage = ceil($tong / $per);
            if ($page > $npage) {
                $page = $npage;
            }
            $st = ($page - 1) * $per;
            $en = $page * $per;
            $output .= '<div class="movies-list">';
            foreach ($content as $file) {
                if ($i >= $st) {
                    $img = '/data/thumb/' . $file[8];
                    $title = $file[9];
                    $output .= '<div id="lazyimg" class="movie-item"><a href="/' . $file[10] . '.html" title="' . $title . '"><div><img loading="lazy" data-src="' . $img . '" src="https://cdn.jsdelivr.net/gh/FAQ9/NSRP/loading.svg" alt="' . $title . '" /></div><div class="name-movie">' . $title . '</div></a></div>';
                }
                $i++;
                if ($i >= $en) {
                    break;
                }
            }
            $output .= '</div></div>';
            if ($npage > 1) {
                $output .= '<div class="pagination">';
                if ($page > 1) {
                    $output .= '<a class="page less" href="/'.$kw.'page/' . ($page - 1) . '">&laquo;</a>';
                }
                if ($page > 1) {
                    $output .= '<a title="Page 1" href="/'.$kw.'page/1">1</a>';
                }
                if ($page > 4) {
                    $output .= ' <a href="#">...</a>';
                }
                if ($page > 3) {
                    $output .= '<a href="/'.$kw.'page/' . ($page - 2) . '">' . ($page - 2) . '</a>';
                }
                if ($page > 2) {
                    $output .= '<a href="/'.$kw.'page/' . ($page - 1) . '">' . ($page - 1) . '</a>';
                }
                if ($npage > 1) {
                    $output .= '<a class="active_page" href="#">' . $page . '</a>';
                }
                if ($page < ($npage - 1)) {
                    $output .= '<a href="/'.$kw.'page/' . ($page + 1) . '">' . ($page + 1) . '</a>';
                }
                if ($page < ($npage - 2)) {
                    $output .= '<a href="/'.$kw.'page/' . ($page + 2) . '">' . ($page + 2) . '</a>';
                }
                if ($page < ($npage - 3)) {
                    $output .= '<a href="#">...</a>';
                }
                if ($page < $npage) {
                    $output .= '<a href="/'.$kw.'page/' . $npage . '">' . $npage . '</a>';
                }
                if ($page < $npage) {
                    $output .= '<a class="page larger" href="/'.$kw.'page/' . ($page + 1) . '">&raquo;</a>';
                }
                $output .= '</div>';
            }
        }
    }

    return $output; // Trả về toàn bộ nội dung HTML đã lưu trữ
}


function tags() {
    $split = explode(" ", 'About your new messiah cause your theories catch fire');
    $html = '';
    foreach ($split as $word) {
        $html .= '<a href="/' . rwurl($word) . '">' . $word . '</a>';
    }
    return $html;
}

function isValidUrl($url) {
    // Kiểm tra URL hợp lệ bằng filter_var
    if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
        return true;
    }
    // Kiểm tra URL hợp lệ bằng regex
    if (preg_match('/\b(?:https?|ftp):\/\/\S+/i', $url)) {
        return true;
    }
    return false;
}

function rwurl($title)
{
    $replacement = '-';
    $map = array();
    $quotedReplacement = preg_quote($replacement, '/');
    $default = array(
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
        '/e|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
        '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
        '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
        '/đ|Đ/' => 'd',
        '/ç/' => 'c',
        '/ñ/' => 'n',
        '/ä|æ/' => 'ae',
        '/ö/' => 'o',
        '/ü/' => 'u',
        '/Ä/' => 'A',
        '/Ü/' => 'U',
        '/Ö/' => 'O',
        '/ß/' => 'b',
        '/̃|̉|̣|̀|́/' => '',
        '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ', '/\\s+/' => $replacement,
        sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
    );
    $title = urldecode($title);
    mb_internal_encoding('UTF-8');
    $map = array_merge($map, $default);
    return strtolower(preg_replace(array_keys($map), array_values($map), $title));
} 

function writeJsonToFile($JsonFile, $JsonData) {
    $fp = fopen($JsonFile, 'r+');
    if (flock($fp, LOCK_EX)) {
        // Thao tác đọc/ghi dữ liệu
        ftruncate($fp, 0); // Xóa nội dung file
        fwrite($fp, json_encode($JsonData)); // Ghi dữ liệu JSON vào file
        fflush($fp); // Đảm bảo dữ liệu được ghi đầy đủ vào file
        flock($fp, LOCK_UN); // Giải phóng lock
    } 
    fclose($fp); // Đóng file
}

function IP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return (strlen($ip) > 3 ? $ip : 'localhost');
}

$statusFile = 'data/anti.json';
$banTime = 60;
$maxRequests = 60;
$ip = IP();
$statusData = file_exists($statusFile) ? json_decode(file_get_contents($statusFile), true) : [];


if (!$statusData) {
    $statusData = [];
}
if (!isset($statusData[$ip])) {
    $statusData[$ip] = [
        'c' => 0,
        't' => time()
    ];
}
if ($statusData[$ip]['c'] >= $maxRequests) {
    if (time() - $statusData[$ip]['t'] < $banTime) {
    header('HTTP/1.1 403 Forbidden');
    die(' ');
    }
    $statusData[$ip]['c'] = 0;
    $statusData[$ip]['t'] = time();
}
$statusData[$ip]['c']++;
writeJsonToFile($statusFile, $statusData);
if (count($statusData) > 1000) {
    file_put_contents($statusFile, '');
}




function get_content($noidung, $start, $stop)
{
    $bd = strpos($noidung, $start);
    $kt = strpos(substr($noidung, $bd), $stop) + $bd;
    $content = substr($noidung, $bd, $kt - $bd);
    return $content;
}
// Check IMG FUNC
function check_img($src)
{
    $headers = get_headers($src, 1);
    if (strpos($headers['Content-Type'], 'image/') !== false) {
        return "ok";
    } else {
        return "not";
    }
}

function resize_crop_image($source_file, $dst_dir, $logo, $quality = 99)
{
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
    if ($width < $height) {
        $max_width = $width;
        $max_height = $width;
    } else {
        $max_width = $height;
        $max_height = $height;
    }

    switch ($mime) {
        case 'image/gif':
            $image_create = "imagecreatefromgif";
            $image = "imagegif";
            break;
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 9;
            break;
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 99;
            break;
        default:
            return false;
            break;
    }

    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);

    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;

    if ($width_new > $width) {
        $h_point = (($height - $height_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    } else {
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }

    $image($dst_img, $dst_dir, $quality);

    if ($dst_img) imagedestroy($dst_img);
    if ($src_img) imagedestroy($src_img);
// Đóng dấu LOGO
$save = $dst_dir;
$image = $dst_dir;
$compress = $quality; //chất lượng nén của jpeg
    $marge_bottom = '5';
    $stamp = imagecreatefrompng($logo);
    $width = imagesx($stamp);
    $height = imagesy($stamp);
    $info = getimagesize($image);
    //$mime = $info[mime];
    $h = $info[1];
    $w = $info[0];

    $k = $w - $width;
    $marge_right = $k / 2;
    $marge_r = $marge_right * 2;
    $marge_b = $marge_bottom * 2;
    if ($w >= $width) {

        switch (exif_imagetype($image)) {
            case '3':
                $im = imagecreatefrompng($image);
                break;
            case '2':
                $im = imagecreatefromjpeg($image);
                break;
            case '1':
                $im = imagecreatefromgif($image);
                break;
        }
        imagecopy($im, $stamp, $w - $width - $marge_right, $h - $height - $marge_bottom, 0, 0, $width, $height);
        imagealphablending($im, false);
        imagesavealpha($im, true);

        switch (exif_imagetype($image)) {
            case '3':
                imagepng($im, $save);
                break;
            case '2':
                imagejpeg($im, $save, $compress);
                break;
            case '1':
                imagegif($im, $save);
                break;
        }
    } else {
        copy($image, $save);
    }


}


class SimpleImage {
var $image;
var $image_type;
 
function load($filename) {
 
$image_info = getimagesize($filename);
$this->image_type = $image_info[2];
if( $this->image_type == IMAGETYPE_JPEG ) {
 
$this->image = imagecreatefromjpeg($filename);
} elseif( $this->image_type == IMAGETYPE_GIF ) {
 
$this->image = imagecreatefromgif($filename);
} elseif( $this->image_type == IMAGETYPE_PNG ) {
 
$this->image = imagecreatefrompng($filename);
}
}
function save($filename, $image_type=IMAGETYPE_JPEG, $compression=85, $permissions=null) {
 
if( $image_type == IMAGETYPE_JPEG ) {
imagejpeg($this->image,$filename,$compression);
} elseif( $image_type == IMAGETYPE_GIF ) {
 
imagegif($this->image,$filename);
} elseif( $image_type == IMAGETYPE_PNG ) {
 
imagepng($this->image,$filename);
}
if( $permissions != null) {
 
chmod($filename,$permissions);
}
}
function output($image_type=IMAGETYPE_JPEG) {
 
if( $image_type == IMAGETYPE_JPEG ) {
imagejpeg($this->image);
} elseif( $image_type == IMAGETYPE_GIF ) {
 
imagegif($this->image);
} elseif( $image_type == IMAGETYPE_PNG ) {
 
imagepng($this->image);
}
}
function getWidth() {
 
return imagesx($this->image);
}
function getHeight() {
 
return imagesy($this->image);
}
function resizeToHeight($height) {
 
$ratio = $height / $this->getHeight();
$width = $this->getWidth() * $ratio;
$this->resize($width,$height);
}
 
function resizeToWidth($width) {
$ratio = $width / $this->getWidth();
$height = $this->getheight() * $ratio;
$this->resize($width,$height);
}
 
function scale($scale) {
$width = $this->getWidth() * $scale/100;
$height = $this->getheight() * $scale/100;
$this->resize($width,$height);
}
 
function resize($width,$height) {
$new_image = imagecreatetruecolor($width, $height);
imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
$this->image = $new_image;
}
}




function anh_moe($img)
{
$api_key = 'chv_7ZYR_6e2e21e53d053eb1ef387e6d0cd9a5a2631d06f528d8b1e6f5c9e0702e45ffa673b9078cc39bfcd535568523e5c3d49f3fff32f82c60d8c379010b089f6af089';
$ch = curl_init('https://anh.moe/api/1/upload/?key=' . $api_key . '&format=json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'source' => new CURLFile($img)
));

$response = curl_exec($ch);

if($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
$data = json_decode($response, true);
$ok = $data["image"]["thumb"]["url"];
return $ok;

}

curl_close($ch);
}


function own_content_type($filename) {

        $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            'mp4' => 'video/mp4',
            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

$fileName      = $filename;
$tmp           = explode('.', $fileName);
$ext = end($tmp);

        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
    }


//up video abyss
function abyss($file_path)
{
$file_name  = explode("/", $file_path);
$file_name = end($file_name);
    $cfile = new CURLFile($file_path, own_content_type($file_path), $file_name);
    $post = array('file' => $cfile);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://up.hydrax.net/9b439bed82df14c38b64958ff5e7bfc6');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = get_content($result, 'slug":"', '"}');
    $result = preg_replace('/slug":"/', '', $result);
    return 'https://short.ink/' . $result;
}

// Up video Vidoza
function vidoza($file, $params = array())
{
    $apiToken = 'rbva7un48yvyslcl3ikgstldzsv7nh4jaf9w4pplairpuuohtpg8uknj46e4';
    $ch = curl_init('https://api.vidoza.net/v1/upload/http/server');
    $authorization = "Authorization: Bearer " . $apiToken; // Prepare the authorisation token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization)); // Inject the token into the header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
        return false;
    }
    curl_close($ch);
    $res = json_decode($res);
    if (!$res->data) {
        return false;
    }

    // POST variables
    $postParams = array();
    foreach (array_merge((array)$res->data->upload_params, $params) as $field => $value) {
        $postParams[$field] = $value;
    }
    if (function_exists('curl_file_create')) { // php 5.5+
        $postParams['file'] = curl_file_create($file);
    } else {
        $postParams['file'] = '@' . realpath($file);
    }

    // Upload file
    $ch = curl_init($res->data->upload_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $postResult = curl_exec($ch);
    curl_close($ch);
    $result = get_content($postResult, 'code":"', '"}');
    $result = preg_replace('/code":"/', '', $result);
    return "https://vidoza.net/embed-{$result}.html";
}

//up video dood
function dood($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://doodapi.com/api/upload/url?key=195938f11c2jv5m474szs7&url=' . $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = get_content($result, 'code":"', '"}');
    $result = preg_replace('/code":"/', '', $result);
    return 'https://doodstream.com/e/' . $result;
}

//up video streamtape
function stape($url, $id = 123)
{
$login = 'c1b65ab9a2396edde161';
$key = '4WPyMmRkmVTKQQR';
if ($id == 123) {
	$curl = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.streamtape.com/remotedl/add?login='.$login.'&key='.$key.'&url='.$url.'',
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl, $opts);
	$response = json_decode(curl_exec($curl), true);
	$id = $response['result']['id'];
} else { $id = $id; }
	$curl2 = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.streamtape.com/remotedl/status?login='.$login.'&key='.$key.'&limit=1&id='.$id.'',
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl2, $opts);
	$response = json_decode(curl_exec($curl2), true);
	$dl = $response['result'][''.$id.'']['url'];
$dl = preg_replace('/\/v\//', '/e/', $dl);
    
if (strlen($dl) > 10) { return $dl; } else { 
return stape($url, $id);
}
}



//save video
function savevd($filename, $urlImage)
{
    $fImage = fopen($urlImage, 'r');
    $data = null;
    while (!feof($fImage)) {
        $data .= fread($fImage, 4000);
    }
    fclose($fImage);
    $streamwrite = fopen($filename, 'w');
    fwrite($streamwrite, $data);
    fclose($streamwrite);
    return strlen($data);
}

function up_xt($link)
{
    if (strlen($link) > 10) {
        @set_time_limit(0);
        $auto = 'http://xtgem.com/autologin/0690529ba6b66785f3f9b444fed8bad7/Y2hpY2gubXcubHQ='; //auto link xtgem
        $sever = 'xtgem.com'; // sever xtgem
        $cookie = 'data/cache/cookie.txt'; // file chứa cookie login xtgem
        $ua = 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 15_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.112 Mobile/15E148 Safari/604.1'; // fake trình duyệt để đăng nhập
        $dir = 'images'; // thư mục lưu ảnh bên xtgem

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        curl_setopt($ch, CURLOPT_URL, $auto);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_exec($ch);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_URL, 'http://' . $sever . '/filebrowser');
        $nd = curl_exec($ch);
        preg_match('#token=(.*?)&#is', $nd, $matoken);
        $token = @$matoken[1];
        curl_setopt($ch, CURLOPT_URL, 'http://' . $sever . '/filebrowser/file_upload?file=/' . $dir . '/');
        curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, 'http://' . $sever . '/filebrowser/file_upload_save?__token=' . $token . '&file=/' . $dir . '/');
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('MAX_FILE_SIZE' => '5242880', 'remote_file' => $link, 'upload_more' => 'y', 'submit' => 'OK'));
        $hm = curl_exec($ch);
        curl_close($ch);
        preg_match('#<div id="content" class="action_btns blu redirect">(.*?)</div>#is', $hm, $tfile);
        if ($tfile[1]) {
            return 'ok';
        } else {
            return 'no';
        }
    }
}

/// xóa thư mục và file ///
function remove_dir($dir = null)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);

        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") remove_dir($dir . "/" . $object);
                else unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}


function processJsonData() {
    // Đường dẫn tới tệp JSON gốc
    $jsonFile = 'data/data.json';

    // Đường dẫn tới tệp gzip
    $gzipFile = 'data/data.json.gz';

    // Khởi tạo biến jsonData
    $jsonData = [];

    // Kiểm tra nếu tệp gzip đã tồn tại
    if (!file_exists($gzipFile)) {
        // Nếu tệp gzip chưa tồn tại, thực hiện nén dữ liệu
        $jsonData = array_reverse(json_decode(file_get_contents($jsonFile), true));
        $compressedData = gzencode(json_encode($jsonData), 9);
        file_put_contents($gzipFile, $compressedData);
        return $jsonData; // Trả về dữ liệu sau khi nén
    } else {
        // Đọc dữ liệu từ tệp gzip
        $fileHandle = gzopen($gzipFile, 'r');
        if (!$fileHandle) {
            die('Không thể mở tệp gzip.');
        }

        $data = '';
        while (!gzeof($fileHandle)) {
            $buffer = gzread($fileHandle, 4096);
            if ($buffer === false) {
                die('Lỗi khi đọc tệp nén.');
            }
            $data .= $buffer;
        }
        gzclose($fileHandle);

        // Decode JSON
        $jsonData = json_decode($data, true);

        return $jsonData; // Trả về dữ liệu đã giải nén
    }
}


if (session_status() == PHP_SESSION_NONE) {
session_start();
}
?>