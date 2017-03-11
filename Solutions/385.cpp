#include<bits/stdc++.h>
using namespace std;

int A[100005],B[100005];

int main()
{
	int N;
	cin>>N;
	
	int i;
	
	for (i=1;i<=N;i++)
	{
		scanf("%d",&A[i]);
		B[i]=A[i];
	}
	
	sort(A+1,A+N+1);

	
	int mini=0,maxi=0,cur1=0,cur2=0;
	for (i=1;i<=N;i++)
	{
		mini+=(cur1+A[i]);
		maxi+=(cur2+B[i]);
		cur1+=A[i];
		cur2+=B[i];
	}
	
	cout<<maxi-mini<<endl;
}