<template>
    <div class="container">
        <div class="" style="margin: 20px 0px 20px 0px;">
        <span>MANTER OPERADORA</span>
        <hr>
        </div>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add" class="nav-item nav-link">Add Book</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>
