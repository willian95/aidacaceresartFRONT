<div class="elipse">
    <img  src="{{ asset('assets/img/loader/loader.svg') }}">
</div>


<style>
    .elipse {
        background: #fff;
        position: fixed;
        z-index: 9999999;
        height: 100%;
        width: 100%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 0;
    }

    .elipse img {
        /*opacity: 0.3;*/
        position: absolute;
        animation-name: colombia;
        animation-duration: 2s;
        /* or: Xms */
        animation-iteration-count: infinite;
        animation-direction: alternate;
        /* or: normal */
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
        /* or: backwards, both, none */
        animation-delay: 1s;
        width: 60%;
    margin-left: 14rem;
    margin-top: 20rem;
    }



 /*   @-webkit-keyframes colombia {
        0% {
            opacity: 0.2;
        }

        100% {
            opacity: 1;
        }
    }*/
</style>