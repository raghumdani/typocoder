#include<bits/stdc++.h>
using namespace std;
int main()
{
	int N,T;
	scanf("%d",&T);
	while(T--)
	{
		string S1,S2;
		cin>>S1>>S2;
		int sz=S1.size();
		int i,hamming=0;
		for (i=0;i<sz;i++)
		{
			hamming+=abs(S1[i]-S2[i]);
		}
		cout<<hamming<<endl;
	}
}