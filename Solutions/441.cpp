#include <iostream>
#include<vector>
#include<algorithm>
using namespace std;

int main() {
	vector<long long int> A;
	vector<long long int>::iterator it;
	long long int N, i, a, b, sum1, sum2;
	cin>>N;
	sum1 = 0;
	b = 0;
	for (i = 0; i < N; ++i)
	{
	    cin>>a;
	    A.push_back(a);
	    b += a;
	    sum1 += b; 
	} 
	
	sort(A.begin(), A.end());
	b = 0;
	sum2 = 0;
	for (it = A.begin(); it != A.end(); ++it)
	{
	    b += *it;
	    sum2 += b;
	}
	
	cout<<sum1 - sum2;
	return 0;
}