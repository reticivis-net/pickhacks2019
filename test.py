import sys
import math
import numpy as np
import pickle


class Connection:
    def __init__(self, connectedNeuron):
        self.connectedNeuron = connectedNeuron
        self.weight = np.random.normal()
        self.dWeight = 0.0


class Neuron:
    eta = 0.001
    alpha = 0.01

    def __init__(self, layer):
        self.dendrons = []
        self.error = 0.0
        self.gradient = 0.0
        self.output = 0.0
        if layer is None:
            pass
        else:
            for neuron in layer:
                con = Connection(neuron)
                self.dendrons.append(con)

    def addError(self, err):
        self.error = self.error + err

    def sigmoid(self, x):
        return 1 / (1 + math.exp(-x * 1.0))

    def dSigmoid(self, x):
        return x * (1.0 - x)

    def setError(self, err):
        self.error = err

    def setOutput(self, output):
        self.output = output

    def getOutput(self):
        return self.output

    def feedForword(self):
        sumOutput = 0
        if len(self.dendrons) == 0:
            return
        for dendron in self.dendrons:
            sumOutput = sumOutput + dendron.connectedNeuron.getOutput() * dendron.weight
        self.output = self.sigmoid(sumOutput)

    def backPropagate(self):
        self.gradient = self.error * self.dSigmoid(self.output)
        for dendron in self.dendrons:
            dendron.dWeight = Neuron.eta * (
            dendron.connectedNeuron.output * self.gradient) + self.alpha * dendron.dWeight
            dendron.weight = dendron.weight + dendron.dWeight
            dendron.connectedNeuron.addError(dendron.weight * self.gradient)
        self.error = 0


class Network:
    def __init__(self, topology):
        self.layers = []
        for numNeuron in topology:
            layer = []
            for i in range(numNeuron):
                if (len(self.layers) == 0):
                    layer.append(Neuron(None))
                else:
                    layer.append(Neuron(self.layers[-1]))
            layer.append(Neuron(None))
            layer[-1].setOutput(1)
            self.layers.append(layer)

    def setInput(self, inputs):
        for i in range(len(inputs)):
            self.layers[0][i].setOutput(inputs[i])

    def feedForword(self):
        for layer in self.layers[1:]:
            for neuron in layer:
                neuron.feedForword()

    def backPropagate(self, target):
        for i in range(len(target)):
            self.layers[-1][i].setError(target[i] - self.layers[-1][i].getOutput())
        for layer in self.layers[::-1]:
            for neuron in layer:
                neuron.backPropagate()

    def getError(self, target):
        err = 0
        for i in range(len(target)):
            e = (target[i] - self.layers[-1][i].getOutput())
            err = err + e ** 2
        err = err / len(target)
        err = math.sqrt(err)
        return err

    def getResults(self):
        output = []
        for neuron in self.layers[-1]:
            output.append(neuron.getOutput())
        output.pop()
        return output

    def getThResults(self):
        output = []
        for neuron in self.layers[-1]:
            o = neuron.getOutput()
            if (o > 0.5):
                o = 1
            else:
                o = 0
            output.append(o)
        output.pop()
        return output

def train(ilayers, hlayers, olayers):
    topology = []
    topology.append(ilayers)
    topology.append(hlayers)
    topology.append(olayers)
    net = Network(topology)
    Neuron.eta = 0.09
    Neuron.alpha = 0.015
    while True:
        err = 0
        inputs = [[1, 1, 1, 1, 1, 1, 1, 1, 1, 1],[0, 0, 0, 0, 0, 0, 0, 0, 0, 0],[1, 1, 1, 1, 1, 1, 1, 1, 1, 0],[1, 1, 1, 1, 1, 1, 1, 1, 0, 1],[1, 1, 1, 1, 1, 1, 1, 0, 1, 1],[1, 1, 1, 1, 1, 1, 0, 1, 1, 1],
                 [1, 1, 1, 1, 1, 0, 1, 1, 1, 1],[1, 1, 1, 1, 0, 1, 1, 1, 1, 1],[1, 1, 1, 0, 1, 1, 1, 1, 1, 1],[1, 1, 0, 1, 1, 1, 1, 1, 1, 1],[1, 0, 1, 1, 1, 1, 1, 1, 1, 1],[0, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                 [1, 0, 1, 0, 0, 1, 1, 0, 1, 1],[1, 0, 1, 1, 0, 1, 0, 1, 1, 0],[1, 0, 1, 1, 0, 1, 1, 1, 0, 0],[0, 0, 0, 0, 1, 1, 1, 1, 1, 1],[0, 0, 0, 1, 1, 1, 1, 1, 1, 0],[0, 0, 1, 1, 1, 1, 1, 1, 0, 0],
                 [0, 1, 1, 1, 1, 1, 1, 0, 0, 0],[1, 1, 1, 1, 1, 1, 0, 0, 0, 0],[1, 1, 1, 1, 1, 0, 0, 0, 0, 1],[1, 1, 1, 1, 0, 0, 0, 0, 1, 1],[1, 1, 1, 0, 0, 0, 0, 1, 1, 1],[1, 1, 0, 0, 0, 0, 1, 1, 1, 1],
                 [1, 0, 0, 0, 0, 1, 1, 1, 1, 1],[0, 0, 0, 0, 0, 0, 0, 1, 1, 1],[0, 0, 0, 0, 0, 0, 1, 1, 1, 0],[0, 0, 0, 0, 0, 1, 1, 1, 0, 0],[0, 0, 0, 0, 1, 1, 1, 0, 0, 0],[0, 0, 0, 1, 1, 1, 0, 0, 0, 0],
                 [0, 0, 1, 1, 1, 0, 0, 0, 0, 0],[0, 1, 1, 1, 0, 0, 0, 0, 0, 0],[1, 1, 1, 0, 0, 0, 0, 0, 0, 0],[1, 1, 0, 0, 0, 0, 0, 0, 0, 1],[1, 0, 0, 0, 0, 0, 0, 0, 1, 1],[0, 0, 0, 0, 0, 1, 0, 1, 0, 1],
                 [0, 0, 0, 0, 1, 0, 1, 0, 1, 0],[0, 0, 0, 1, 0, 1, 0, 1, 0, 0],[0, 0, 1, 0, 1, 0, 1, 0, 0, 0],[0, 1, 0, 1, 0, 1, 0, 0, 0, 0],[1, 0, 1, 0, 1, 0, 0, 0, 0, 0],[0, 1, 0, 1, 0, 0, 0, 0, 0, 1],
                 [1, 0, 1, 0, 0, 0, 0, 0, 1, 0]]
        outputs = [[0,0,0,0,1],[1,0,0,0,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,0,1,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],
                  [0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],
                  [0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0],[0,1,0,0,0]]
        for i in range(len(inputs)):
            net.setInput(inputs[i])
            net.feedForword()
            net.backPropagate(outputs[i])
            err = err + net.getError(outputs[i])
        print ("error: ", err)
        if err < 0.05:
            print('Training has finished!')
            testOsave = str(input('Test NN (t) or Save NN (s) or Delete NN (d): '))
            if testOsave == 'd':
                break
            elif testOsave == 't':
                a = int(input('First Number: '))
                b = int(input('Second Number: '))
                c = int(input('Third Number: '))
                d = int(input('Fourth Number: '))
                e = int(input('Fith Number: '))
                f = int(input('Sixth Number: '))
                g = int(input('Seventh Number: '))
                h = int(input('Eighth Number: '))
                i = int(input('Nineth Number: '))
                j = int(input('Tenth Number: '))
                net.setInput([a, b, c, d, e, f, g, h, i, j])
                net.feedForword()
                print (net.getThResults())
                testRsave = str(input('Save NN (s) or Delete NN (d): '))
                if testRsave == 'd':
                    break
                else:
                    pickle.dump(net, open( "nn.p", "wb" ))
            else:
                pickle.dump(net, open( "nn.p", "wb" ))

def run(filename):
    net = pickle.load(open(filename, "rb"))
    a = int(input('First Number: '))
    b = int(input('Second Number: '))
    c = int(input('Third Number: '))
    d = int(input('Fourth Number: '))
    e = int(input('Fith Number: '))
    f = int(input('Sixth Number: '))
    g = int(input('Seventh Number: '))
    h = int(input('Eighth Number: '))
    i = int(input('Nineth Number: '))
    j = int(input('Tenth Number: '))
    net.setInput([a, b, c, d, e, f, g, h, i, j])
    net.feedForword()
    print (net.getThResults())

def main():

    runOrTrain = str(input('Run or Train a NN (r or t): '))
    if runOrTrain == 'r':
        run('nn.p')
    elif runOrTrain == 't':
        train(10,18,5)
    else:
        print('Please say either r or t')


if __name__ == '__main__':
    main()
