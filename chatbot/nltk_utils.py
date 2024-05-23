import numpy as np
import nltk
from nltk.tokenize import word_tokenize
from nltk.stem import RSLPStemmer

nltk.download('punkt')
nltk.download('rslp')

stemmer = RSLPStemmer()

def tokenize(sentence):
    """
    Tokenize the sentence in Portuguese
    """
    return word_tokenize(sentence.lower(), language='portuguese')

def stem(word):
    """
    Stem a word using the RSLP stemmer for Portuguese
    """
    return stemmer.stem(word.lower())

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
