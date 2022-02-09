<template>
    <div>
        <h2>{{create['title']}}</h2>
        <form class="row gy-2" method="POST" v-bind:action="create['url']">
            <div class="col-12">
            <input type="hidden" name="_token" v-bind:value="csrf">
            </div>
            <div class="col-12" v-for="(item,index) in table" :key="index">
            <label v-bind:for=item.key  class="form-label">{{item.name}}</label>
            <input type="text" class="form-control"  v-bind:name=item.name_text v-bind:id=item.key v-bind:placeholder=item.placeholder>
            </div>
            <div class="row justify-content-end gy-2">
            <button type="submit" class="btn btn-primary col col-lg-2">{{create['submit']}}</button>
            </div>
        </form>
    </div>
</template>

<script>
    import json from './index.json'
    export default {
    data: function() {
            return {
                table:json['table'],
                create:json['create'],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
            
        },
    }
</script>