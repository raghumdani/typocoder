#include<bits/stdc++.h>
using namespace std;

int main()
{
	int T;
	scanf("%d",&T);
	
	while(T--)
	{
		int mul=1;
		string S;
		cin>>S;
		
		for (int i=0;i<S.size();i++)
		mul*=(S[i]-'0');
		
		cout<<mul<<endl;
	}
	
}