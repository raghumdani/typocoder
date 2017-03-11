#include<iostream>
#include<cmath>
using namespace std;
int main()
{
	int g;
	cin>>g;
	while(g--)
	{
		long long int x;
		cin>>x;
		int k=int(log(x)/log(2));
		k=k+1;
		//cout<<k;
		k=k-k/3;
		if(k%2==1)
		{
			cout<<"Bob"<<endl;
		}
		else
		{
			cout<<"Alice"<<endl;
		}

	}
}