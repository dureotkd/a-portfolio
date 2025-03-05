<link rel="stylesheet" href="/lion/index.css">

<div class="overflow-hidden">
    <div id="world"></div>
    <div id="instructions">
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r70/three.min.js"></script>
<script src="/lion/index.js"></script>
<script>
    setTimeout(() => {
        if (parent.AOS) {
            parent.AOS.refresh();
        }
    }, 2000); // 2초 후 실행
</script>