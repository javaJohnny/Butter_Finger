<template lang="html">
    <div class="movie-interact">
        <button type="button" class="btn btn-success" @click="doFavorite">Favorite</button>
        <button type="button" class="btn btn-warning">Watched</button>
    </div>
</template>

<script>
export default {
    props: ['movieId', 'hasChecked'],
    data() {
        return{
            dataHasChecked: 0,
            fmsg: null,
        }
    },
    mounted() {
        this.dataHasChecked = this.hasChecked;
    },
    methods: {
        doFavorite(){
            let type = 'favorite',
                fmsg = 'favorite'
            if(this.dataHasChecked){
                type = 'unfavorite';
                fmsg = 'unfavorite';
            }


            axios({
                method: 'POST',
                url: '/'+type+'/' + this.movieId + '/',
            }).then((response) => {
                console.log(response);
                if(response.data.status == 'success'){
                    if(type == 'favorite'){
                        this.dataHasChecked = true;
                    } else {
                        this.dataHasChecked = false;
                    }
                    return;
                }
            })
        },

    }

}

</script>

<style lang="css">
    .likeBtn{
        display: inline;
    }
    .likeBtn:hover {
        cursor: pointer;
    }
    .likeBtn a {
        margin-left: 0;
    }

    .likeBtn p {
        margin-left: 0;
        display: inline;
        font-size: 1.5em;
    }

</style>
