<template>
    <div class="cs-loader">
        <div class="cs-loader-inner">
            <label>	●</label>
            <label>	●</label>
            <label>	●</label>
            <label>	●</label>
            <label>	●</label>
            <label>	●</label>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoadingOverlay"
    }
</script>

<style scoped>
    .cs-loader-inner {
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        position: absolute;
        width: calc(100% - 200px);
        color: #FFF;
        padding: 0 100px;
        text-align: center;
    }

    .cs-loader-inner label {
        font-size: 20px;
        opacity: 0;
        display:inline-block;
    }

    @keyframes loading-animation {
        0% {
            opacity: 0;
            transform: translateX(-300px);
        }
        33% {
            opacity: 1;
            transform: translateX(0px);
        }
        66% {
            opacity: 1;
            transform: translateX(0px);
        }
        100% {
            opacity: 0;
            transform: translateX(300px);
        }
    }

    @-webkit-keyframes loading-animation {
        0% {
            opacity: 0;
            -webkit-transform: translateX(-300px);
        }
        33% {
            opacity: 1;
            -webkit-transform: translateX(0px);
        }
        66% {
            opacity: 1;
            -webkit-transform: translateX(0px);
        }
        100% {
            opacity: 0;
            -webkit-transform: translateX(300px);
        }
    }

    .cs-loader-inner label:nth-child(6) {
        animation: loading-animation 2s infinite ease-in-out;
    }

    .cs-loader-inner label:nth-child(5) {
        animation: loading-animation 2s 100ms infinite ease-in-out;
    }

    .cs-loader-inner label:nth-child(4) {
        animation: loading-animation 2s 200ms infinite ease-in-out;
    }

    .cs-loader-inner label:nth-child(3) {
        animation: loading-animation 2s 300ms infinite ease-in-out;
    }

    .cs-loader-inner label:nth-child(2) {
        animation: loading-animation 2s 400ms infinite ease-in-out;
    }

    .cs-loader-inner label:nth-child(1) {
        animation: loading-animation 2s 500ms infinite ease-in-out;
    }
</style>
