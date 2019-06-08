<template>
<div>
    <h1>{{dealObject[0].name}}</h1>
    <div class="deal_box">
        <span class="address">{{deal[0].description}}</span>

    </div>
</div>
</template>

<script>
export default {
props: {
    deal:{type: Array}
},
computed: {
    dealObject() {
        return this.deal 
    }
},
}
</script>

<style>
.deal_box{
    background-color: #fff;
    border: 2px solid #dcdcdc;
    padding: 20px 15px;
}

.address{
    margin-left: 15px;
    margin-top: 25px;
    font-size: 18px;
    font-weight: 500;
}
</style>
