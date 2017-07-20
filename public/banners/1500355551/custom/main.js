function initBrasilia() {
	var _obj = $('.animacao');

	// Animação de entrada da linha 1
	TweenLite.to($('#linha1', _obj), 0.5, { height: 130, onComplete() {
		// Animação de entrada das linhas 2 e 3
		TweenLite.to($('#linha2', _obj), 0.5, { width: 470 });
		TweenLite.to($('#linha3', _obj), 0.5, { height: 130, onComplete() {
			// Animação de entrada do primeiro texto
			TweenLite.to($('#text1', _obj), 0.5, { opacity: 1, onComplete() {
				// Animação de saída do primeiro texto
				TweenLite.to($('#text1', _obj), 0.5, { delay: 4, opacity: 0, onComplete() {
					// Animação de entrada do segundo texto
					TweenLite.to($('#text2', _obj), 0.5, { opacity: 1, onComplete() {
						// Animação de saída do segundo texto
						TweenLite.to($('#text2', _obj), 0.5, { delay: 1.5, opacity: 0, onComplete() {
							// Animação de saída das linhas 3 e 2
							TweenLite.to($('#linha3', _obj), 0.5, { height: 0 });
							TweenLite.to($('#linha2', _obj), 0.5, { width: 0, onComplete() {
								// Animação de saída da linha 1
								TweenLite.to($('#linha1', _obj), 0.5, { height: 0 });
							}});
							// Animação de saída das linhas 6 e 5
							TweenLite.to($('#linha6', _obj), 0.5, { height: 0 });
							TweenLite.to($('#linha5', _obj), 0.5, { height: 0, onComplete() {
								// Animação de saída da linha 4
								TweenLite.to($('#linha4', _obj), 0.5, { width: 0, onComplete() {
									// Animação de fim da parte 1
									TweenLite.to($('#parte1', _obj), 0, { display: 'none', onComplete() {
										// Animação de início da parte 2
										TweenLite.to($('#parte2', _obj), 0, { display: 'block', onComplete() {
											// Animação de entrada do carro
											TweenLite.to($('#carro', _obj), 1, { bottom: 0, onComplete() {
												// Animação de entrada das linhas 7, 8, 11 e 9
												TweenLite.to($('#linha7', _obj), 0.5, { height: 460 });
												TweenLite.to($('#linha8', _obj), 0.5, { width: 655 });
												TweenLite.to($('#linha11', _obj), 0.5, { height: 235 });
												TweenLite.to($('#linha9', _obj), 0.5, { width: 585, onComplete() {
													// Animação de entrada da linha 10
													TweenLite.to($('#linha10', _obj), 0.5, { height: 80, onComplete() {
														// Continua na função descrita abaixo
														continuacao();
													}});
												}});
											}});
										}});
									}});
								}});
							}});
						} });
					}});
				}});
			} });
		} });
	}});

	// Animação de entrada da linha 4
	TweenLite.to($('#linha4', _obj), 0.5, { width: 380, onComplete() {
		// Animação de entrada das linhas 5 e 6
		TweenLite.to($('#linha5', _obj), 0.5, { height: 135 });
		TweenLite.to($('#linha6', _obj), 0.5, { height: 100 });
	}});
}

function continuacao() {

	var _obj = $('.animacao');

	// Animação de entrada do terceiro texto
	TweenLite.to($('#text3', _obj), 0.5, { opacity: 1, onComplete() {
		// Animação de saída do terceiro texto
		TweenLite.to($('#text3', _obj), 0.5, { delay: 3, opacity: 0, onComplete() {
			// Animação de saída da linha 10
			TweenLite.to($('#linha10', _obj), 0.5, { height: 0, onComplete() {
				// Animação de saída das linhas 9, 11, 8 e 7
				TweenLite.to($('#linha9', _obj), 0.5, { width: 0 });
				TweenLite.to($('#linha11', _obj), 0.5, { height: 0 });
				TweenLite.to($('#linha8', _obj), 0.5, { width: 0 });
				TweenLite.to($('#linha7', _obj), 0.5, { height: 0, onComplete() {
					// Animação de saída do carro
					TweenLite.to($('#carro', _obj), 1, { bottom: -300, onComplete() {
						// Animação de fim da parte 2
						TweenLite.to($('#parte2', _obj), 0, { display: 'none', onComplete() {
							// Animação de início da parte 3
							TweenLite.to($('#parte3', _obj), 0, { display: 'block', onComplete() {
								// Animação de entrada do quarto texto
								TweenLite.to($('#text4', _obj), 0.5, { opacity: 1, onComplete() {
									// Animação de entrada das logos
									TweenLite.to($('#logos', _obj), 1, { bottom: 60 });
								}});
							}});
						}});
					}});
				}});
			}});
		}});
	}});
}