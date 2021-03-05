<template>
        <el-header class="header" style="height: 80px; width: 100%; bottom:0; left: 0;">
            <el-row>
                <h2>Momeguros</h2> 
            </el-row>
        </el-header>
</template>       

<style scoped>
    .header {
        background-color: #2d364c;
        opacity: .88;
        color: #fff !important;
        display: flex;
        align-items: center !important;
        justify-content: flex-start;
        font-family: inherit !important;
    }
    .header__menu{
        margin-right: 10px;
    }
    .header__menu--profile{
        margin-right: 8px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }
</style>