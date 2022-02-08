<template>
    <div class="d-flex">
        <div class="col-2">
            <ul class="btn-group-vertical">
            <li class="btn btn-outline-secondary" role="group" v-for="(list,index) in menu" :key="index">
                <a v-bind:href="'#'+list" @click="keyCount(index)" class="nav-link py-3 border-bottom" aria-current="page" v-bind:title=list data-bs-toggle="tooltip" data-bs-placement="right">
                <svg width="24" height="24" role="img" v-bind:aria-label=list><use v-bind:xlink:href="'#'+list" /></svg>
                </a>
                
            </li>
        </ul>
        </div>
        <div class="col-10">
                <home-component v-if="keyMenu===0"></home-component>
                <plan-component v-if="keyMenu===2"></plan-component>
        </div>
    </div>
        
</template>

<script>
    export default {
        data: function() {
        return {
            menu:['Home','Dashboard','Plans','Orders','Products','Customers'],
            keyMenu:0
            }
        },
        methods:{
            keyCount(numberIndex){
                this.keyMenu=numberIndex;
            }
        }
        
    }
</script>
