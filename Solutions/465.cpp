#include <bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int t;
	cin>>t;
	while (t--)
	{
		long long n, x=0, count=0;
		cin>>n;
		int par=1;
		while (n>1)
		{
			n=n/2;
			count++;
		}
		if (count%3==0)
		{
			cout<<"Alice"<<endl;
			/* code */
		}
		else
		{
			cout<<"Bob\n";
		}
	}
	return 0;
}