// test.js
const { expect } = require('chai');
const factorial = require('./factorial'); // Assuming your module is in a 'factorial.js' file

describe('factorial', () => {
  it('should calculate the factorial of a positive integer', () => {
    expect(factorial(5)).to.equal(120);
  });

  it('should return 1 for 0 factorial', () => {
    expect(factorial(0)).to.equal(1);
  });

  it('should throw an error for negative numbers', () => {
    expect(() => factorial(-1)).to.throw(Error);
  });
});