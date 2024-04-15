import numpy as np
import nltk
from nltk.tokenize import word_tokenize

nltk.download('punkt')

def tokenize(sentence, language='english'):
    """
    Tokenize the sentence based on language
    """
    if language == 'english':
        return word_tokenize(sentence)
    elif language == 'portuguese':
        # Usar o tokenizador para o idioma português e forçar a tokenização de palavras compostas
        return word_tokenize(sentence.lower(), language='portuguese', preserve_line=True)
    else:
        raise ValueError("Language not supported")

def stem(word):
    """
    Stem a word
    """
    # Aqui você pode implementar o stemming para diferentes idiomas, se necessário
    return word.lower()

def bag_of_words(tokenized_sentence, words):
    """
    Create a bag of words array
    """
    print("Tokenized Sentence:", tokenized_sentence)
    # Stem each word
    sentence_words = [stem(word) for word in tokenized_sentence]
    print("Stemmed Words:", sentence_words)
    # Initialize bag with 0 for each word
    bag = np.zeros(len(words), dtype=np.float32)
    for idx, w in enumerate(words):
        if w in sentence_words:
            print(f"Word '{w}' found in sentence")
            bag[idx] = 1
    return bag