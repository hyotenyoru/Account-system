<template>
    <div class="modal fade" id="familyModal" aria-labelledby="familyModalLabel" aria-hidden="true">
         <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="familyModalLabel">{{create['title']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row gy-2" method="POST" v-bind:action="create['url']">
                        <div class="col-12">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                            <input type="hidden" name="custom_id" v-bind:value="custom_id">
                        </div>
                        <div class="col-12" v-for="(item,index) in table" :key="index">
                            <label v-bind:for=item.key  class="form-label">{{item.name}}</label>
                            <input type="text" class="form-control"  v-bind:name=item.name_text v-bind:id=item.key v-bind:placeholder=item.placeholder>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary col-2">{{create['submit']}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import json from './index.json'
    export default {
    data: function() {
            return {
                table:json['table'],
                create:json['create'],
                custom_id:document.getElementById('custom_id').innerHTML,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
    }
</script>