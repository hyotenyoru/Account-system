<template>
    <div class="modal fade" id="orderlistModal" aria-labelledby="orderlistModalLabel" aria-hidden="true">
         <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">{{create['title']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row gy-2" method="POST" v-bind:action="create['url']">
                        <div class="col-12">
                            <input type="hidden" name="_token" v-bind:value="csrf">
                            <input type="hidden" name="order_id" v-bind:value="order_id">
                            
                        </div>
                        <div class="col-12" v-for="(item,index) in table" :key="index">
                            <label v-bind:for=item.key  class="form-label">{{item.name}}</label>
                            <input v-if="item.option==='input'" type="text" class="form-control"  v-bind:name=item.name_text v-bind:id=item.key v-bind:placeholder=item.placeholder>
                            <select v-if="item.option==='select'"   class="form-select" type="text"  v-bind:name=item.name_text v-bind:id=item.key>
                                <option selected></option>
                                <option  v-for="(select,code) in datas[item.complex]" :key="code" v-bind:value="select[item.select_id]">{{select[item.select_name]}}</option>
                            </select>
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
        mounted(){
            axios.get('/family')
          .then((response) => {
            response.data.forEach(array => {
                var arraykey=array['custom_id'];
                if (arraykey.indexOf(this.custom_id)!=-1) 
                    this.family.push(array);
            });
          })

          axios.get('/product')
          .then((response) => {
              response.data.forEach(array => {
                    this.product.push(array);
                });
            })

            this.datas={"product":this.product,"family":this.family};
      },
    data: function() {
            return {
                datas:[],
                family:[],
                product:[],
                url:json['create']['select'],
                table:json['table'],
                create:json['create'],
                array_key:'custom_id',
                order_id:document.getElementById('order_id').innerHTML,
                custom_id:document.getElementById('custom_id').innerHTML,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
    }   
</script>