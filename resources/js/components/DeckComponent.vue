<template>
    <div class="content-wrapper">
        <div class="game-setting-container pb-2">
            <div class="input-group mb-2 w-75">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="no-of-ppl">Number of players</span>
                </div>
                <input type="text" class="form-control" aria-label="Number of player" aria-describedby="no-of-ppl" v-model="noOfPlayer" @keypress="onlyNumber" maxlength="2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-start-game" @click="startGame">Start</button>
                </div>
            </div>

            <div class="form-check pt-2">
                <input class="form-check-input" type="checkbox" value="" id="card-mode" v-model="cardMode">
                <label class="form-check-label" for="card-mode">
                    Card mode
                </label>
            </div>
        </div>
        <div class="game-cards-container pt-4">
            <!-- Display player's card if distributed -->
            <template v-if="cardObjects.length > 0">
                <ul>
                    <li v-for="index in parseInt(totalPlayer)" :key="index" class="mb-4">
                        <player-component 
                            :cardObjects="cardObjects" 
                            :index="index" 
                            :cardMode="cardMode"
                            :suitColor="suitColor"
                        ></player-component>
                    </li>
                </ul>
            </template>

            <!-- Display default message before start -->
            <template v-else>
                <div>Please key in number of players and click start</div>
            </template>
        </div>
    </div>
</template>

<script>
    import PlayerComponent from './partials/PlayerComponent';

    export default {
        data() {
            return {
                noOfPlayer: null,
                cardMode: true,
                totalPlayer: 0,
                ranks: ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'],
                suits: ['♥','♦','♠','♣'],
                suitChar: ['H','D','S','C'],
                cardObjects: [],
                suitColor: {
                    '♠': 'black',
                    '♣': 'black',
                    '♦': 'red',
                    '♥': 'red',
                },
            }
        },
        components: { PlayerComponent },
        methods: {
            onlyNumber ($event) {
                //Only numbers are allowed
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) {
                    $event.preventDefault();
                }
            },
            startGame(){
                this.cardObjects = [];

                //Trim extra space when noOfPlayer is not null
                this.noOfPlayer = (this.noOfPlayer != null) ? this.noOfPlayer.replace(/\s+/g, '') : this.noOfPlayer;
                
                if(this.noOfPlayer == null || this.noOfPlayer == 0){
                    //Display error message if detected invalid input number of player
                    this.$swal({
                        icon: 'error',
                        title: 'Oops...',
                        html: 'Input value does not exist or value is invalid.<br>Please key in number greater than 0.'
                    });
                }else{
                    this.totalPlayer = this.noOfPlayer;

                    //Start distributing cards to players
                    this.shuffleDeck();
                }
            },
            shuffleDeck() {
                let id = 1;
                var cards = [];

                //Shuffle deck and sort in sequence order
                for( let s = 0; s < this.suits.length; s++ ) {
                    for( let r = 0; r < this.ranks.length; r++ ) {
                        let card = {
                            id: id,
                            rank: this.ranks[r],
                            suit: this.suits[s],
                            suitChar: this.suitChar[s],
                        };

                        cards.push(card);
                        id++;
                    }
                }

                //Sort the cards randomly
                cards.sort(() => Math.random() - 0.5);

                var chunkLength = Math.max(cards.length/this.noOfPlayer ,1);

                //Distribute cards to player
                for (var i = 0; i < this.noOfPlayer; i++) {
                    if(chunkLength*(i+1)<=cards.length) this.cardObjects.push(cards.slice(chunkLength*i, chunkLength*(i+1)));
                }
            },
        }
    }
</script>
